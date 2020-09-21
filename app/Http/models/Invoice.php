<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class Invoice extends Model {

    protected $table = 'payments';

    protected $fillable = ['id', 'admin_id', 'company_id', 'user_id', 'invoice_no', 'items_detail', 'sub_total','total_tax','discount','grand_total','currency','payment_status','client_note','termsncondition','created_date','updated_date'];

    public function get_all_invoices() {

        $invoices = DB::table('payments')
                ->leftJoin('newusers', 'newusers.id', '=', 'payments.user_id')
                ->get(array('payments.id', 'payments.invoice_no', 'newusers.username as client_name', 'payments.payment_status', 'payments.grand_total', 'payments.due_date', 'payments.currency'));
        return $invoices;
    }

    public function get_invoice_by_id($id) {

        $invoices = DB::table('payments')
                ->leftJoin('newusers', 'newusers.id', '=', 'payments.user_id')
                ->leftJoin('companies', 'companies.id', '=', 'payments.company_id')
                ->where('payments.id', $id)
                ->get(array(
            'payments.id',
            'payments.user_id as client_id',
            'payments.invoice_no',
            'payments.items_detail',
            'payments.payment_status',
            'payments.sub_total',
            'payments.total_tax',
            'payments.discount',
            'payments.grand_total',
            'payments.currency',
            'payments.client_note',
            'payments.termsncondition',
            'payments.due_date',
            'payments.created_date',
            'newusers.username as client_name',
            'newusers.firstname',
            'newusers.lastname',
            'newusers.email as client_email',
            'newusers.mobile_no as client_mobile_no',
            'newusers.address as client_address',
            'companies.id as company_id',
            'companies.name as company_name',
            'companies.email as company_email',
            'companies.address1 as company_address1',
            'companies.address2 as company_address2',
            'companies.mobile_no as company_mobile_no',
        ));
        return $invoices;
    }

    public function get_customer_list() {
        $customer = DB::table('newusers')
                ->get(array('id', 'firstname', 'lastname'));
        return $customer;
    }

    public function customer_detail($id) {
        $customer = DB::table('newusers')->where('id',$id)
                ->get();
        return $customer;
    }

}
