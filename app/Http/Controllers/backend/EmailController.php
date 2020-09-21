<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Email;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Session;
use DB;

class EmailController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $email = Email::all()->toArray();
        return view('backend.email_template.list', compact('email'));
    }

    /**
     * Add user form
     * @return type
     */
    public function create() {
        return view('backend.email_template.create', array('title' => 'Add Email Template'));
    }

    /**
     * Edit user form
     * @return type
     */
    public function edit($id) {
        $email = Email::find($id);
        return view('backend.email_template.edit', array('title' => 'Edit Email Template'), compact('email'));
    }

    /**
     * Add user here
     * @param Request $request
     * @return type
     */
    public function store(Request $request) {
        $email = new Email;
        $request->validate([
            'email_template_for' => 'required|unique:email_template',
            'email_template_subject' => 'required',
            'email_template_body' => 'required',
        ]);
        $unique_slug = $request->get('identifier');
        if ($unique_slug) {    // Hidden value
            $unique_slug = $email->get_unique_slug($unique_slug);
        }
        $Email = new Email([
            'email_template_for' => $request->get('email_template_for'),
            'email_template_subject' => $request->get('email_template_subject'),
            'email_template_body' => base64_encode($request->get('email_template_body')),
            'email_template_slug' => $unique_slug,
        ]);
        $Email->save();
        return redirect()->route('email_templates')->with('success', 'Email Template Added successfully');
    }
    /**
     * update email template using id 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function update(Request $request, $id) {
        $email = new Email;
        $request->validate([
            'email_template_for' => 'required|unique:email_template,email_template_for,' . $id . ',id',
            'email_template_subject' => 'required',
            'email_template_body' => 'required',
        ]);
        $unique_slug = $request->get('identifier');

        if (!empty($id)) {
            if ($unique_slug) {    // Hidden value
                $unique_slug = $email->get_unique_slug($unique_slug, $id);
            }
            $email = Email::find($id);
            $email->email_template_for = $request->get('email_template_for');
            $email->email_template_subject = $request->get('email_template_subject');
            $email->email_template_body = base64_encode($request->get('email_template_body'));
            $email->email_template_slug = $unique_slug;
            $email->save();
            return redirect()->route('email_templates')->with('success', 'Email Template Update successfully');
        } else {
            return redirect()->route('email_templates')->with('error', 'Email Template Update error');
        }
    }

    /**
     * User Listing using server side 
     * @param Request $request
     * @return type
     */
    public function datatable_json(Request $request) {
        $table_name = 'email_template';
        $query = DB::table('email_template');

        return Datatables::of($query)
                        ->editColumn('id', function($query) {
                            return '<label class="checkcontainer"><input type="checkbox" name="ids[]" class="chkbox" value="' . $query->id . '"  /> <span class="checkmark"></span></label>';
                        })
                        ->rawColumns(['action', 'id'])
                        ->editColumn('email_template_body', function($query) {
                            if (strlen($query->email_template_body) <= 40) {
                                $email_template_body = strip_tags(base64_decode($query->email_template_body));
                            } else {
                                $email_template_body = substr(strip_tags(base64_decode($query->email_template_body)), 0, 40) . '...';
                            }
                            return $email_template_body;
                        })
                        ->addColumn('action', function($query) {
                            return '<a href="email_templates/edit/' . $query->id . '" title="Edit" class="update btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i></a>';
                        })
                        ->make(true);
    }

    /**
     * Check and multidelete record
     */
    public function multidel(Request $request) {
        $id = $request->get('records_to_del');
        foreach ($id as $val) {
            DB::table('email_template')->where('id', $val)->delete();
        }        
        Session::flash('success', 'Email Template deleted successfully');          
    }

}
