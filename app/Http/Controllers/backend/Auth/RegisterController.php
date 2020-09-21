<?php

namespace App\Http\Controllers\BackEnd\Auth;

use App\Http\models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    public function registerForm() {
        return view('backend.auth.register');
    }

    public function document() {
        return view('document');
    }

    public function postRegister(Request $request) {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('admin/register')  // or back()
                            ->withErrors($validator)
                            ->withInput();
        }
        event(new Registered($user = $this->create($request->all())));
        Session::flash('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');
        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'username' => ['required', 'string', 'unique:admin'],
                    'firstname' => ['required', 'string'],
                    'lastname' => ['required', 'string'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:admin'],
                    //'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'password' => 'required|min:8|confirmed',
                    'password_confirmation' => 'required|min:8'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $user = array(
            'username' => $data['username'],
            'firstname' => $data['firstname'],
            'admin_role_id' => 2,
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'token' => md5(rand(0, 1000)),
        );

        $email_template = Helper::get_email_template('reset-password-template');        
        if (!empty($email_template)) {
            $email_verification_link = "<a href='auth/verify/" . $user['token'] . ">Activate Account</a>";
            $email_template_body = base64_decode($email_template->email_template_body);
            $message = html_entity_decode($email_template_body);
            $data['subject'] = $email_template->email_template_subject;
            $message = str_replace("%username%", $data['username'], $message);
            $message = str_replace("%link%", $email_verification_link, $message);

            Mail::send('emails.commonemail', ['content' => $message], function ($message) use ($data) {
                $message->to($data['email'], 'text')->subject($data['subject']);
            });
            Session::flash('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');
        }        
        return Admin::create($user);
    }

}
