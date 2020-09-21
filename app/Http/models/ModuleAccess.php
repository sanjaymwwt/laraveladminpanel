<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class ModuleAccess extends Model {

    protected $primaryKey = 'id';
    protected $table = 'module_access';
    protected $fillable = ['admin_role_id','module', 'operation'];
    
    public function check_module_access($module_slug) {
        $result = DB::table('module_access')
                ->select(DB::raw('GROUP_CONCAT(operation) as rights'))
                ->where('module', $module_slug)
                ->where('admin_role_id', 1)
                ->groupBy('admin_role_id')
                ->get();   
        
        if (!$result->isEmpty()) {
            $result = $result[0];
            return explode(',', $result->rights);
        } else {
            return array('no_rights');
        }        
    }
}
