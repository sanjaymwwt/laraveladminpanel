<?php

namespace App\Http\Controllers\backend\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\models\Role;
use App\Http\models\ModuleAccess;
use App\Http\models\Module;
use App\Helpers\Helper;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use DB;

class RolesController extends Controller {

    public function __construct(Request $request) {        
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('admin_roles',$this->user->admin_role_id);            
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
        $data['roles'] = Role::all()->toArray();
        $data['users_rights'] = $this->users_rights;
        return view('backend.admin_roles.list', compact('data'));
    }

    /**
     * Add user form
     * @return type
     */
    public function create() {
        if (!in_array('add', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        return view('backend.admin_roles.create', array('title' => 'Add New Role'));
    }

    /**
     * Edit user form
     * @return type
     */
    public function edit($id) {
        if (!in_array('edit', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $role = DB::table('admin_roles')->where('admin_role_id', $id)->get();

        $role = (array) $role[0];
        return view('backend.admin_roles.edit', array('title' => 'Edit Role'), compact('role'));
    }

    /**
     * Add user here
     * @param Request $request
     * @return type
     */
    public function store(Request $request) {
        if (!in_array('add', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $request->validate([
            'admin_role_title' => 'required|unique:admin_roles',
        ]);
        $roles = new Role([
            'admin_role_title' => $request->get('admin_role_title'),
            'admin_role_status' => $request->get('admin_role_status'),
            'created_at' => date('Y-m-d h:i:sa'),
        ]);
        $roles->save();
        return redirect()->route('admin_roles')->with('success', 'Role Added successfully');
    }

    public function update(Request $request, $id) {
        if (!in_array('edit', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        
        $request->validate([
            'admin_role_title' => 'required|unique:admin_roles,admin_role_title,' . $id . ',admin_role_id',
        ]);
        if (!empty($id)) {

            $roles = Role::find($id);
            $roles->admin_role_title = $request->get('admin_role_title');
            $roles->admin_role_status = $request->get('admin_role_status');
            $roles->save();
            return redirect()->route('admin_roles')->with('success', 'Role Update successfully');
        } else {
            return redirect()->route('admin_roles')->with('error', 'Role Update error');
        }
    }

    /**
     * Changes status of users listing
     * @param Request $request
     */
    public function change_status(Request $request) {
        $result = 0;
        if (!in_array('change_status', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $roles = Role::find($request->get('id'));
        $roles->admin_role_status = $request->get('status');
        $roles->save();
        $result = 1;
        echo json_encode(trim($result));
        exit;
    }

    /**
     * 
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function destroy($id) {
        if (!in_array('delete', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $roles = Role::find($id)->delete();

        return redirect()->route('admin_roles')
                        ->with('success', 'Role deleted successfully');
    }

    /**
     * Access function of role wise acess
     * @param type $id
     */
    public function access($id = "") {
        $role = new Role;
        $data['record'] = $role->get_role_by_id($id);
        $data['access'] = $role->get_access($id);
        $data['modules'] = Module::all()->toArray();
        return view('backend.admin_roles.access', compact('data'));
    }

    /**
     * update access of role
     */
    function set_access(Request $request) {
        $role = new Role;
        $roleid = $request->get('admin_role_id');
        $module = $request->get('module');
        $operation = $request->get('operation');
        $status = $request->get('status');
        $role->set_access($roleid, $module, $operation, $status);
    }

}
