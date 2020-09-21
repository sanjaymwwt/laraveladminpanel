<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\models\Admin;
use App\Http\models\ModuleAccess;
use App\Http\models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\models\Role;
use DB;

class ProfileController extends Controller {

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

    /**
     * Change password of logged user
     * @param Request $request
     * @return type
     */
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
