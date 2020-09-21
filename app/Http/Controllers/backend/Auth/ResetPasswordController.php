<?php

namespace App\Http\Controllers\BackEnd\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Http\models\Admin;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset requests
      | and uses a simple trait to include this behavior. You're free to
      | explore this trait and override any methods you wish to tweak.
      |
     */

use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * add custom reset password form
     * @param type $token
     * @return type
     */
    public function showResetForm($token) {        
        return view('backend.auth.passwords.reset', compact('token'));
    }

    public function update(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);
        $email = $request->get('email');
        $password = $request->get('password');
        $token = $request->get('token');
        $response = (array) DB::table('admin')->where(['email' => $email,'password_reset_code' => $token])->first();
        if(!empty($response)){
            $admin = Admin::find($response['admin_id']);
            $admin->password = Hash::make($password);
            $admin->save();  
            return redirect()->route('admin');
        } else {
            Session::flash('status', 'Password Reset Code is either invalid or expired.');
            return redirect()->route('password.reset.token',$token);
        }
        
    }

}
