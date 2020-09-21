<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Helper {

    public static function check_module_access($module_slug, $roleid = null) {
// Get the currently authenticated user...
        if ($roleid == null) {            
            $roleid = '1';
        }    
        $result = DB::table('module_access')
                ->select(DB::raw('GROUP_CONCAT(operation) as rights'))
                ->where('module', $module_slug)
                ->where('admin_role_id', $roleid)
                ->groupBy('admin_role_id')
                ->get();        
        if (!$result->isEmpty()) {
            $result = $result[0];
            return explode(',', $result->rights);
        } else {
            return array('no_rights');
        }
    }
    public static function get_email_template($module_slug) {
// Get the currently authenticated user...
            
        $result = DB::table('email_template')
                ->select('*')
                ->where('email_template_slug', $module_slug)
                ->get();        
        if (!$result->isEmpty()) {
            $result = $result[0];
            return $result;
        } else {
            return array();
        }
    }

}
