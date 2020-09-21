<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\User;
use App\Helpers\Helper;
use Yajra\DataTables\Facades\DataTables;
use DB;

class UsersController extends Controller {

    public function __construct(Request $request) {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('users', $this->user->admin_role_id);
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
        $data['users'] = User::all()->toArray();
        $request->session()->forget('search_form_status');
        $request->session()->forget('search_form_email');
        $data['users_rights'] = $this->users_rights;
        return view('backend.users.list', compact('data'));
    }

    /**
     * Add user form
     * @return type
     */
    public function create() {
        // user access check 
        if (!in_array('add', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        return view('backend.users.create', array('title' => 'Add Users'));
    }

    /**
     * Edit user form
     * @return type
     */
    public function edit($id) {
        // user access check 
        if (!in_array('edit', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $users = User::find($id);
        return view('backend.users.edit', array('title' => 'Edit Users'), compact('users'));
    }

    /**
     * Add user here
     * @param Request $request
     * @return type
     */
    public function store(Request $request) {
        // user access check 
        if (!in_array('add', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $request->validate([
            'username' => 'required|unique:newusers',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobileno' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required',
        ]);
        $users = new User([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'mobile_no' => $request->get('mobileno'),
            'password' => $request->get('password'),
            'address' => $request->get('address'),
        ]);
        $users->save();
        return redirect()->route('users')->with('success', 'User Added successfully');
    }
    /**
     * update user using id
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function update(Request $request, $id) {
        // user access check 
        if (!in_array('edit', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobileno' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        if (!empty($id)) {
            $users = User::find($id);
            $users->firstname = $request->get('firstname');
            $users->lastname = $request->get('lastname');
            $users->email = $request->get('email');
            $users->mobile_no = $request->get('mobileno');
            $users->address = $request->get('address');
            $users->save();
            return redirect()->route('users')->with('success', 'User Update successfully');
        } else {
            return redirect()->route('users')->with('error', 'User Update error');
        }
    }

    /**
     * User Listing using server side 
     * @param Request $request
     * @return type
     */
    public function datatable_json(Request $request) {
        $table_name = 'newusers';
        $query = DB::table('newusers');
        if ($request->session()->has('search_form_status')) {
            $status = trim($request->session()->get('search_form_status'));
            $query->where('is_active', $status);
        }
        if ($request->session()->has('search_form_email')) {
            $email = trim($request->session()->get('search_form_email'));
            $query->where('email', 'LIKE', '%' . $email . '%');
        }
        return Datatables::of($query)
                        ->addColumn('id', function($query) {
                            return '<label class="checkcontainer"><input type="checkbox" name="ids[]" class="chkbox" value="' . $query->id . '"  /> <span class="checkmark"></span></label>';
                        })
                        ->addColumn('is_active', function($query) {
                            $status = ($query->is_active == 1) ? 'checked' : '';
                            if (in_array('change_status', $this->users_rights)) {
                                return $statusIcon = '<input class="tgl_checkbox tgl-ios" data-id="' . $query->id . '" id="cb_' . $query->id . '" type="checkbox" ' . $status . '><label for="cb_' . $query->id . '"></label>';
                            } else {
                                return $statusIcon = ' -- ';
                            }
                        })
                        ->rawColumns(['is_active' => 'is_active', 'id' => 'id'])
                        ->addColumn('action', function($query) {
                            if (in_array('edit', $this->users_rights)) {
                                return '<a href="users/edit/' . $query->id . '" title="Edit" class="update btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i></a>';
                            } else {
                                return ' -- ';
                            }
                        })
                        ->make(true);
    }

    /**
     * datatables session data here
     * @param Request $request
     */
    public function search(Request $request) {
        $status = $request->get('search_form_status');
        $email = $request->get('search_form_email');
        $request->session()->put('search_form_status', $status);
        $request->session()->put('search_form_email', $email);
    }

    /**
     * Changes status of users listing
     * @param Request $request
     */
    public function change_status(Request $request) {
        $result = 0;
        // user access check 
        if (!in_array('change_status', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $users = User::find($request->get('id'));
        $users->is_active = $request->get('status');
        $users->save();
        $result = 1;
        echo json_encode(trim($result));
        exit;
    }

    /**
     * Check and multidelete record
     */
    public function multidel(Request $request) {
        /*
         * Check Module access rights
         */
        if (!in_array('delete', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $id = $request->get('records_to_del');        
        foreach ($id as $val) {
            DB::table('newusers')->where('id', $val)->delete();
        }
        exit();
    }

}
