<?php

namespace App\Http\Controllers\backend\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\models\Admin;
use App\Http\models\ModuleAccess;
use App\Helpers\Helper;
use App\Http\models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\models\Role;
use Yajra\DataTables\Facades\DataTables;
use DB;

class AdminController extends Controller {

    private $user;

    public function __construct(Request $request) {
        $moduleAccess = new ModuleAccess;        
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('admin',$this->user->admin_role_id);            
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
        $type = '';                
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $data['admin'] = Admin::all()->toArray();
        $request->session()->forget('type', $type);
        $request->session()->forget('status');
        $data['admin_roles'] = Role::all()->toArray();
        $data['users_rights'] = $this->users_rights;
        return view('backend.admin.list', compact('data'));
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
        $data['admin_roles'] = Role::all()->toArray();
        return view('backend.admin.create', array('title' => 'Add New Admin'), compact('data'));
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
        $data['admin'] = Admin::find($id);
        $data['admin_roles'] = Role::all()->toArray();
        return view('backend.admin.edit', array('title' => 'Edit Admin'), compact('data'));
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
            'username' => 'required|unique:admin',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobileno' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);
        $admin = new Admin([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'mobile_no' => $request->get('mobileno'),
            'password' => Hash::make($request->get('password')),
            'admin_role_id' => $request->get('role'),
        ]);
        $admin->save();
        return redirect()->route('admin')->with('success', 'Admin Added successfully');
    }

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
            'role' => 'required',
            'email' => 'required|email',
            'mobileno' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        if (!empty($id)) {
            $admin = Admin::find($id);
            $admin->firstname = $request->get('firstname');
            $admin->lastname = $request->get('lastname');
            $admin->email = $request->get('email');
            $admin->mobile_no = $request->get('mobileno');
            $admin->admin_role_id = $request->get('role');
            $admin->save();
            return redirect()->route('admin')->with('success', 'Admin Update successfully');
        } else {
            return redirect()->route('admin')->with('error', 'Admin Update error');
        }
    }

    /**
     * User Listing using server side 
     * @param Request $request
     * @return type
     */
    public function datatable_json(Request $request) {
        $admin = new Admin;
        $query = $admin->getAllAdmin($request);

        return Datatables::of($query)
                        ->addColumn('status', function($query) {
                            $status = ($query->is_active == 1) ? 'checked' : '';

                            if (in_array('change_status', $this->users_rights)) {
                                return $statusIcon = '<input class="tgl_checkbox tgl-ios" data-id="' . $query->admin_id . '" id="cb_' . $query->admin_id . '" type="checkbox" ' . $status . '><label for="cb_' . $query->admin_id . '"></label>';
                            } else {
                                return $statusIcon = ' -- ';
                            }
                        })
                        ->addColumn('action', function($query) {

                            if (in_array('edit', $this->users_rights)) {
                                $edit_icon = '<a href="admin/edit/' . $query->admin_id . '" title="Edit" class="btn btn-warning btn-xs mr5"><i class="fa fa-pencil-square-o"></i></a>';
                            } else {
                                $edit_icon = '';
                            }
                            if (in_array('delete', $this->users_rights)) {
                                $delete_icon = '<a href="admin/delete/' . $query->admin_id . '" onclick="return deleteAdmin();" title="Delete" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>';
                            } else {
                                $delete_icon = '';
                            }
                            if (in_array('edit', $this->users_rights) || in_array('delete', $this->users_rights)) {
                                return $actionIcon = $edit_icon . $delete_icon;
                            } else {
                                return $actionIcon = ' -- ';
                            }
                        })
                        ->addColumn('admin_role_title', function($query) {
                            return '<a href="admin_roles" class="btn btn-xs btn-success">' . $query->admin_role_title . '</a>';
                        })
                        ->rawColumns(['status' => 'status', 'admin_role_title' => 'admin_role_title'])
                        ->editColumn('firstname', function($query) {
                            return $query->firstname . " " . $query->lastname;
                        })
                        ->make(true);
    }

    /**
     * Changes status of admin listing
     * @param Request $request
     */
    public function change_status(Request $request) {
        // user access check 
        if (!in_array('change_status', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $result = 0;
        $admin = Admin::find($request->get('id'));
        $admin->is_active = $request->get('status');
        $admin->save();
        $result = 1;
        echo json_encode(trim($result));
        exit;
    }

    /**
     * datatables session data here
     * @param Request $request
     */
    public function search(Request $request) {
        $status = $request->get('status');
        $type = $request->get('type');
        $request->session()->put('status', $status);
        $request->session()->put('type', $type);
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function delete($id) {
        // user access check 
        if (!in_array('delete', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $admin = Admin::find($id)->delete();
        return redirect()->route('admin')
                        ->with('success', 'Admin deleted successfully');
    }

    /**
     * login user profile
     * @return type
     */
    public function profile() {
        $id = Auth::id();
        $admin = Admin::find($id);
        return view('backend.profile.index', compact('admin'));
    }

    /**
     * Profile update here
     * @param Request $request
     * @return type
     */
    public function profileupdate(Request $request) {
        $id = Auth::id();
        $request->validate([
            'username' => 'required|unique:admin,username,' . $id . ',admin_id',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
        $admin = Admin::find($id);
        $admin->username = $request->get('username');
        $admin->firstname = $request->get('firstname');
        $admin->lastname = $request->get('lastname');
        $admin->email = $request->get('email');
        $admin->mobile_no = $request->get('mobile_no');
        $admin->save();
        return redirect()->route('admin.profile')
                        ->with('success', 'Profile has been Updated Successfully');
    }

    public function changes_pwd(Request $request) {
        if ($request->get('submit')) {
            $id = Auth::id();
            $request->validate([
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8'
            ]);
            $admin = Admin::find($id);
            $admin->password = Hash::make($request->get('password'));
            $admin->save();
            return redirect()->route('admin.changes_pwd')
                            ->with('success', 'Password has been changed successfully!');
        } else {
            return view('backend.profile.change_pwd');
        }
    }

}
