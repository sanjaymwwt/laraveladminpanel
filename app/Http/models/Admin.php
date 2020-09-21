<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model {

    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = ['admin_role_id','username', 'firstname', 'lastname', 'email', 'mobile_no', 'password', 'address'];
    
    /**
     * get All admin list
     * @param type $request
     * @return type
     */
    public function getAllAdmin($request) {
        
        $query = DB::table('admin')
                ->leftJoin('admin_roles', 'admin.admin_role_id', '=', 'admin_roles.admin_role_id');
        if ($request->session()->has('status')) {
            $status = trim($request->session()->get('status'));
            $query->where('admin.is_active', $status);
        }
        if ($request->session()->has('type')) {
            $type = trim($request->session()->get('type'));
            $query->where('admin.admin_role_id', $type);
        }
        return $query;
    }

}
