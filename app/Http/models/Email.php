<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Email extends Model {

    protected $table = 'email_template';
    protected $fillable = ['email_template_for', 'email_template_subject','email_template_body', 'email_template_slug'];
    public function get_unique_slug($slug,$id = ''){
        
        if(!empty($id)){
            $pages =  DB::table('email_template')->where('email_template_slug',$slug)->where('id','!=',$id)->count();        
        } else {
            $pages =  DB::table('email_template')->where('email_template_slug',$slug)->count();        
        }
        if(!empty($pages)){
            return strtolower($slug_value . '-' . $pages);
        }
        return strtolower($slug);
        
    }
}
