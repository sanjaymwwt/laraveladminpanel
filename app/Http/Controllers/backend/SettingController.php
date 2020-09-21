<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Setting;
use App\Http\models\Common;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\TestEmail;

class SettingController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {

        $get_setting = Setting::all()->toArray();
        $tbl_details = array();
        $data['settings'] = array();
        $data['img_setting_id'] = '';
        if (!empty($get_setting)) {
            foreach ($get_setting as $key => $value) {
                if ($value['setting_name'] == 'site_logo') {
                    if (!empty($value['setting_value'])) {
                        $data['img_setting_id'] = $value['setting_id'];
                    }
                }
                $tbl_details[$value['setting_name']] = $value['setting_value'];
                $settings[$value['setting_name']] = $value['setting_value'];
            }
            $data['settings'] = $settings;
        }

        $data['posts'] = $tbl_details;
        $data['request'] = $request;
        $data['post_hidden_tab'] = ($request->session()->has('hidden_tab_session')) ? $request->session()->get('hidden_tab_session') : 'general_settings';
        return view('backend.setting.general', compact('data'));
    }

    /**
     * Change settings and save in database
     */
    public function update_settings(Request $request) {
        $Common = new Common;
        $get_settings = $Common->get_setting_data();
        $mailmethod = $request->get('mail_sending_method');
        $request->validate([
            'admin_email' => 'required|email',
            'mail_sending_method' => 'required',
            'smtp_mail_from' => 'required',
        ]);
        if ($mailmethod == 'smtp') {
            $request->validate([
                'smtp_host' => 'required',
                'smtp_port' => 'required',
                'smtp_tls_ssl_opt' => 'required',
                'smtp_user' => 'required',
                'smtp_pass' => 'required',
            ]);
        }
        if ($request->get('hidden_tab')) {
            $request->session()->put('hidden_tab_session', $request->get('hidden_tab'));
        }
        $insert_data_arr = array();
        $update_data_arr = array();
        foreach ($request->all() as $key => $value) {
            $is_data_avail = DB::table('setting')->where('setting_name', $key)->get();
            if (!$is_data_avail->isEmpty()) {     // update here                                           
                $setting = Setting::find($is_data_avail[0]->setting_id);
                $setting->setting_id = $is_data_avail[0]->setting_id;
                $setting->setting_name = $key;
                $setting->setting_value = $value;
                $setting->save();
            } else {                      // insert here                     
                $setting = new Setting([
                    'setting_name' => $key,
                    'setting_value' => $value,
                ]);
                $setting->save();
            }
        }
        /* Upload site logo */
        if ($request->hasFile('site_logo')) {
            //echo 'asdv';die;
            $request->validate([
                'site_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            $image = $request->file('site_logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/setting/');
            $image->move($destinationPath, $name);
            $check_webiste_type = '/uploads/setting/' . $name;
            $imagename = $check_webiste_type;
            if (!empty($get_settings['site_logo'])) {
                if (file_exists(public_path() . $get_settings['site_logo'])) {
                    unlink(public_path() . $get_settings['site_logo']);  // unlink old image
                }
            }
            $is_data_avail = DB::table('setting')->where('setting_name', 'site_logo')->get();
            if (!$is_data_avail->isEmpty()) {
                $setting = Setting::find($is_data_avail[0]->setting_id);
                $setting->setting_name = 'site_logo';
                $setting->setting_value = $imagename;
                $setting->save();
            } else {
                $setting = new Setting([
                    'setting_name' => 'site_logo',
                    'setting_value' => $imagename,
                ]);
                $setting->save();
            }
        }

        if ($request->get('test_to_mail') != "" && $request->get('test_subject') != "") {
            $sendingMethod = $request->get('mail_sending_method');
            $to_mail = $request->get('test_to_mail');
            $subject = $request->get('test_subject');
            $content = strip_tags($request->get('test_email_body'));
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $Common = new Common;
            $response[0] = $to_mail;
            $response[1] = $subject;
            $get_settings = $Common->get_setting_data();
            if ($sendingMethod == 'php_mail') {                
                Mail::to($to_mail)->send(new TestEmail($content,'',$subject));
            } else if ($sendingMethod == 'smtp') {                
                \Mail::send('emails.testemail', ['content' => $content], function ($message) use ($response){
                    $message->to($response[0])->subject($response[1]);
                });
                //$emailsend = sendEmail($to_mail, $subject, $message, $file = '', $cc = '');
            }
            //$this->session->set_flashdata('msg', 'Email Send successfully.');
            return redirect()->route('setting')
                            ->with('success', 'Email Send successfully');
        }
        return redirect()->route('setting')
                        ->with('success', 'Setting Updated successfully');
    }

    /*
     * unlink and delete image
     */

    public function DeleteImage(Request $request) {
        $id = $request->get('id');
        if (!empty($id)) {
            $get_records = DB::table('setting')->where('setting_id', $id)->get();
            if (!$get_records->isEmpty()) {
                foreach ($get_records as $value) {
                    $value = (array) $value;
                    if (file_exists(public_path() . $value['setting_value'])) {
                        unlink(public_path() . $value['setting_value']);  // unlink old image
                    }
                    // update image value as blank
                    $setting = Setting::find($id);
                    $setting->setting_value = '';
                    $setting->save();
                    Session::flash('success', 'Image deleted successfully!');                     
                }
            }
            echo '1';
        }
        echo '0';
    }

}
