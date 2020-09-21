<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Invoice;
use App\Http\models\Common;
use Illuminate\Support\Facades\Auth;
use App\Http\models\Company;
use App\Http\models\User;
use DB;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Helper;
use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\URL;

class InvoiceController extends Controller {

    public function __construct(Request $request) {
        // check module view access from here using middleware
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('invoices', $this->user->admin_role_id);
            if (!in_array('view', $this->users_rights)) {
                $back_to = $_SERVER['REQUEST_URI'];
                $back_to = urlencode($back_to);
                return redirect()->route('access_denied.index', $back_to);
            }
            return $next($request);
        });
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $invoice = new Invoice;
        $data['invoice'] = $invoice->get_all_invoices();
        $data['users_rights'] = $this->users_rights;
        return view('backend.invoice.list', compact('data'));
    }

    /**
     * View invoice using id
     * @param type $id
     * @return type
     */
    public function view_invoice($id = 0) {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $invoice = new Invoice;
        $data['invoice_detail'] = $invoice->get_invoice_by_id($id);
        $data['users_rights'] = $this->users_rights;
        return view('backend.invoice.invoice_view', compact('data'));
    }

    /**
     * pdf download using id
     * @param type $id
     */
    public function invoice_pdf_download($id = 0) {

        $invoice = new Invoice;
        $data['invoice_detail'] = $invoice->get_invoice_by_id($id);
        $invoice_detail = (array) $data['invoice_detail'][0];
        $pdf = PDF::loadView('backend.invoice.invoice_pdf', compact('invoice_detail'));
        return $pdf->download('invoices.pdf');

        // $stylesheet = file_get_contents(base_url('public/dist/css/mpdfstyletables.css'));
    }

    /**
     * Delete invoice here
     * @param type $id
     */
    public function invoice_delete($id) {
        if (!in_array('delete', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        DB::table('payments')->where('id', $id)->delete();
        return redirect()->route('invoices')
                        ->with('success', 'Invoice has been deleted Successfully!');
    }

    /**
     * Add New invoice and Edit invoice
     * @param $id
     * Display add/edit form
     */
    public function add_invoice() {
        /*
         * Check Module access rights
         */
        // user access check 
        if (!in_array('add', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $invoice = new Invoice;
        $data['customer_list'] = $invoice->get_customer_list();
        $data['title'] = 'Add New Invoice';
        $data['id'] = '';
        $data['btn_title'] = 'Save Invoice';
        return view('backend.invoice.add_invoice', compact('data'));
    }

    /**
     * Add New invoice and Edit invoice
     * @param $id
     * Display add/edit form
     */
    public function customer_detail(Request $request) {
        $invoice = new Invoice;
        $id = $request->get('id');
        $customer = $invoice->customer_detail($id);
        $data['customer'] = (array) $customer[0];
        echo json_encode($data['customer']);
    }

    public function edit_invoice($id = 0) {

        // user access check 
        if (!in_array('edit', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $invoice = new Invoice;
        $data['customer_list'] = $invoice->get_customer_list();
        $data['form_details'] = $invoice->get_invoice_by_id($id);
        $data['form_details'] = (array) $data['form_details'][0];
        $data['title'] = 'Edit Invoice';
        $data['btn_title'] = 'Update Invoice';
        $data['id'] = $id;
        return view('backend.invoice.add_invoice', compact('data'));
    }

    /**
     * Add/edit common save function
     * @param type $id
     */
    public function store(Request $request, $id = 0) {
        /*
         * Check Module access rights
         */
        if ($id == '0') {
            $access_slug = 'add';
        } else {
            $access_slug = 'edit';
        }
        if (!in_array($access_slug, $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        /*
         * Check Module access rights end
         */
        if ($request->get('submit')) {
            $request->validate([
                'company_name' => 'required',
                'company_address_1' => 'required',
                'company_address_2' => 'required',
                'client_address' => 'required',
                'firstname' => 'required',
                'user_id' => 'required',
                'email' => 'required|email',
                'company_mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ]);

            if ($id == '0') {

                $company = Company::create([
                            'name' => trim($request->get('company_name')),
                            'address1' => trim($request->get('company_address_1')),
                            'address2' => trim($request->get('company_address_2')),
                            'email' => trim($request->get('company_email')),
                            'mobile_no' => trim($request->get('company_mobile_no')),
                            'created_date' => date('Y-m-d h:m:s')
                ]);
                $company_id = $company->id;
            } else {
                if (!empty($request->get('company_id'))) {
                    $company = Company::find($request->get('company_id'));
                    $company->name = trim($request->get('company_name'));
                    $company->address1 = trim($request->get('company_address_1'));
                    $company->address2 = trim($request->get('company_address_2'));
                    $company->email = trim($request->get('company_email'));
                    $company->mobile_no = trim($request->get('company_mobile_no'));
                    $company->created_date = date('Y-m-d h:m:s');
                    $company->save();
                    $company_id = $request->get('company_id');
                }
            }
            if ($company_id) {
                $qty = $request->get('quantity');
                $items_detail = '';
                if (!empty($qty)) {
                    $items_detail = array();
                    foreach ($qty as $key => $val) {
                        $desc = $request->get('product_description');
                        $price = $request->get('price');
                        $tax = $request->get('tax');
                        $total = $request->get('total');
                        $items_detail[] = array(
                            'product_description' => !empty($desc) ? $desc[$key] : '',
                            'quantity' => $val,
                            'price' => !empty($price) ? $price[$key] : '',
                            'tax' => !empty($tax) ? $tax[$key] : '',
                            'total' => !empty($total) ? $total[$key] : '',
                        );
                    }
                    $items_detail = serialize($items_detail);
                }


                if ($id == '0') {
                    $invoice = Invoice::create([
                                'admin_id' => Auth::id(),
                                'user_id' => $request->get('user_id'),
                                'company_id' => $company_id,
                                'invoice_no' => $request->get('invoice_no'),
                                'txn_id' => '',
                                'items_detail' => $items_detail,
                                'sub_total' => $request->get('sub_total'),
                                'total_tax' => $request->get('total_tax'),
                                'discount' => $request->get('discount'),
                                'grand_total' => $request->get('grand_total'),
                                'currency' => 'USD',
                                'payment_method' => '',
                                'payment_status' => $request->get('payment_status'),
                                'client_note' => $request->get('client_note'),
                                'termsncondition' => $request->get('termsncondition'),
                                'due_date' => date('Y-m-d', strtotime($request->get('due_date'))),
                                'created_date' => date('Y-m-d', strtotime($request->get('billing_date'))),
                    ]);
                    if ($invoice->id) {
                        return redirect()->route('invoices')
                                        ->with('success', 'Invoice has been Added Successfully!');
                    }
                } else {
                    $invoice = Invoice::find($id);

                    $invoice->user_id = $request->get('user_id');
                    $invoice->company_id = $company_id;
                    $invoice->invoice_no = $request->get('invoice_no');
                    $invoice->txn_id = '';
                    $invoice->items_detail = $items_detail;
                    $invoice->sub_total = $request->get('sub_total');
                    $invoice->total_tax = $request->get('total_tax');
                    $invoice->discount = $request->get('discount');
                    $invoice->grand_total = $request->get('grand_total');
                    $invoice->currency = 'USD';
                    $invoice->payment_method = '';
                    $invoice->payment_status = $request->get('payment_status');
                    $invoice->client_note = $request->get('client_note');
                    $invoice->termsncondition = $request->get('termsncondition');
                    $invoice->due_date = date('Y-m-d', strtotime($request->get('due_date')));
                    $invoice->created_date = date('Y-m-d', strtotime($request->get('billing_date')));
                    $invoice->updated_date = date('Y-m-d');
                    $invoice->save();
                    return redirect()->route('invoices')
                                    ->with('success', 'Invoice has been updated Successfully!');
                }
            }
        }
    }

    /**
     * Add/edit common save function
     * @param type $id
     */
    public function update(Request $request, $id = 0) {
        /*
         * Check Module access rights
         */
        if ($id == '0') {
            $access_slug = 'add';
        } else {
            $access_slug = 'edit';
        }
        if (!in_array($access_slug, $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        /*
         * Check Module access rights end
         */
        if ($request->get('submit')) {
            $request->validate([
                'company_name' => 'required',
                'company_address_1' => 'required',
                'company_address_2' => 'required',
                'client_address' => 'required',
                'firstname' => 'required',
                'user_id' => 'required',
                'email' => 'required|email',
                'company_mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ]);

            if ($id == '0') {

                $company = Company::create([
                            'name' => trim($request->get('company_name')),
                            'address1' => trim($request->get('company_address_1')),
                            'address2' => trim($request->get('company_address_2')),
                            'email' => trim($request->get('company_email')),
                            'mobile_no' => trim($request->get('company_mobile_no')),
                            'created_date' => date('Y-m-d h:m:s')
                ]);
                $company_id = $company->id;
            } else {
                if (!empty($request->get('company_id'))) {
                    $company = Company::find($request->get('company_id'));
                    $company->name = trim($request->get('company_name'));
                    $company->address1 = trim($request->get('company_address_1'));
                    $company->address2 = trim($request->get('company_address_2'));
                    $company->email = trim($request->get('company_email'));
                    $company->mobile_no = trim($request->get('company_mobile_no'));
                    $company->created_date = date('Y-m-d h:m:s');
                    $company->save();
                    $company_id = $request->get('company_id');
                }
            }
            if ($company_id) {
                $qty = $request->get('quantity');
                $items_detail = '';
                if (!empty($qty)) {
                    $items_detail = array();
                    foreach ($qty as $key => $val) {
                        $desc = $request->get('product_description');
                        $price = $request->get('price');
                        $tax = $request->get('tax');
                        $total = $request->get('total');
                        $items_detail[] = array(
                            'product_description' => !empty($desc) ? $desc[$key] : '',
                            'quantity' => $val,
                            'price' => !empty($price) ? $price[$key] : '',
                            'tax' => !empty($tax) ? $tax[$key] : '',
                            'total' => !empty($total) ? $total[$key] : '',
                        );
                    }
                    $items_detail = serialize($items_detail);
                }


                if ($id == '0') {
                    $invoice = Invoice::create([
                                'admin_id' => Auth::id(),
                                'user_id' => $request->get('user_id'),
                                'company_id' => $company_id,
                                'invoice_no' => $request->get('invoice_no'),
                                'txn_id' => '',
                                'items_detail' => $items_detail,
                                'sub_total' => $request->get('sub_total'),
                                'total_tax' => $request->get('total_tax'),
                                'discount' => $request->get('discount'),
                                'grand_total' => $request->get('grand_total'),
                                'currency' => 'USD',
                                'payment_method' => '',
                                'payment_status' => $request->get('payment_status'),
                                'client_note' => $request->get('client_note'),
                                'termsncondition' => $request->get('termsncondition'),
                                'due_date' => date('Y-m-d', strtotime($request->get('due_date'))),
                                'created_date' => date('Y-m-d', strtotime($request->get('billing_date'))),
                    ]);
                    if ($invoice->id) {
                        return redirect()->route('invoices')
                                        ->with('success', 'Invoice has been Added Successfully!');
                    }
                } else {
                    $invoice = Invoice::find($id);
                    $invoice->user_id = $request->get('user_id');
                    $invoice->company_id = $company_id;
                    $invoice->invoice_no = $request->get('invoice_no');
                    $invoice->txn_id = '';
                    $invoice->items_detail = $items_detail;
                    $invoice->sub_total = $request->get('sub_total');
                    $invoice->total_tax = $request->get('total_tax');
                    $invoice->discount = $request->get('discount');
                    $invoice->grand_total = $request->get('grand_total');
                    $invoice->currency = 'USD';
                    $invoice->payment_method = '';
                    $invoice->payment_status = $request->get('payment_status');
                    $invoice->client_note = $request->get('client_note');
                    $invoice->termsncondition = $request->get('termsncondition');
                    $invoice->due_date = date('Y-m-d', strtotime($request->get('due_date')));
                    $invoice->created_date = date('Y-m-d', strtotime($request->get('billing_date')));
                    $invoice->updated_date = date('Y-m-d');
                    $invoice->save();
                    return redirect()->route('invoices')
                                    ->with('success', 'Invoice has been updated Successfully!');
                }
            }
        }
    }

    /**
     * Generate file with path of pdf generator
     * @param Request $request
     * @return string
     */
    public function create_pdf(Request $request) {
        $invoice = new Invoice;
        $id = $request->get('id');
        $data['invoice_detail'] = $invoice->get_invoice_by_id($id);

        $invoice_detail = (array) $data['invoice_detail'][0];
        $pdf = PDF::loadView('backend.invoice.invoice_pdf', compact('invoice_detail'));
        $path = base_path() . '/public/uploads/invoice/' . $invoice_detail['invoice_no'] . '.pdf';
        $pdf->save($path);     // store pdf in pulbic invoice folder 
        $url = URL::to('/public');
        $pathnew = $url . '/uploads/invoice/' . $invoice_detail['invoice_no'] . '.pdf';
        return $pathnew;         // return file with attchment path
        exit;
    }

    /**
     * Send email to user with simple mail and smtp attachment mail
     * @param Request $request
     */
    public function send_email_with_invoice(Request $request) {
        $to_mail = $request->get('email');
        $subject = $request->get('subject');
        $content = $request->get('message');
        $cc = $request->post('cc');
        $file = $request->post('file');
        if (!empty($to_mail) && !empty($content)) {
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $Common = new Common;
            $response[0] = $to_mail;
            $response[1] = $file;
            
            $response[2] = $subject;
            $filefullpath = '/uploads/invoice/';
            $url = URL::to('/public');
            $filefullpath = $url . '/uploads/invoice/' . $file;
            $response[3] = $filefullpath;
            $get_settings = $Common->get_setting_data();
            if ($get_settings['mail_sending_method'] == 'php_mail') {
                Mail::to($to_mail)->send(new InvoiceEmail($content,$filefullpath,$subject));
            } else if ($get_settings['mail_sending_method'] == 'smtp') {
                \Mail::send('emails.testemail', ['content' => $content], function ($message) use ($response) {
                    $message->to($response[0])->subject($response[2])
                            ->attachData($response[3], [
                                'as' => $response[1],
                                'mime' => 'application/pdf',
                    ]);
                });
                //$emailsend = sendEmail($to_mail, $subject, $message, $file = '', $cc = '');
            }
            $response['success'] = 'success';
            $response['successmsg'] = 'Email has been send Successfully!';
        } else {
            $response['error'] = '* Field are required';
        }
        echo json_encode($response);
        exit;
    }

}
