<?php

namespace App\Http\Controllers\BackEnd\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use DB;
use App\Helpers\Helper;
use App\Http\models\Admin;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Password Reset Controller
      |--------------------------------------------------------------------------
      |
      | This controller is responsible for handling password reset emails and
      | includes a trait which assists in sending these notifications from
      | your application to your users. Feel free to explore this trait.
      |
     */

use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Reset password form
     * @return type
     */
    public function showLinkRequestForm() {       
        return view('backend.auth.passwords.email');
    }

    /**
     * reset password link 
     */
    public function sendResetLinkEmail(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);
        $email = $request->get('email');
        $response = (array) DB::table('admin')->where('email', $email)->first();
        $tomail = $email;
//        echo "<pre>";
//        print_r($response);
//        die;
        if (!empty($response)) {
            $rand_no = rand(0, 1000);
            $pwd_reset_code = md5($rand_no . $response['admin_id']);
            $admin = Admin::find($response['admin_id']);
            $admin->password_reset_code = $pwd_reset_code;
            $admin->save();
            $reset_link = URL::to('admin/password/reset/' . $pwd_reset_code);
            $subject = "Reset Password Link";

            $email_template = Helper::get_email_template('reset-password-template');
            if (!empty($email_template)) {
                $email_template_body = base64_decode($email_template->email_template_body);
                $message = html_entity_decode($email_template_body);
                $response['subject'] = $email_template->email_template_subject;
                $message = str_replace("%username%", $response['username'], $message);
                $message = str_replace("%link%", $reset_link, $message);

                Mail::send('emails.commonemail', ['content' => $message], function ($message) use ($response) {
                    $message->to($response['email'], 'text')->subject($response['subject']);
                });
                Session::flash('status', 'We have sent instructions for resetting your password to your email!');
            }
            return redirect()->route('password.reset');
        }
        Session::flash('status', 'Email not register,please try again!');
        return redirect()->route('password.reset');
    }

}
