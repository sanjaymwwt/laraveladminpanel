<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Page extends Model {

    protected $table = 'pages';
    protected $primaryKey = 'page_id';
    protected $fillable = ['page_name', 'url_type', 'page_slug','page_url', 'page_target','page_description','status'];
    
    public function get_unique_slug($slug,$id = ''){
        
        if(!empty($id)){
            $pages =  DB::table('pages')->where('page_slug',$slug)->where('page_id','!=',$id)->count();        
        } else {
            $pages =  DB::table('pages')->where('page_slug',$slug)->count();        
        }
        if(!empty($pages)){
            return strtolower($slug_value . '-' . $pages);
        }
        return strtolower($slug);
        
    }
}
