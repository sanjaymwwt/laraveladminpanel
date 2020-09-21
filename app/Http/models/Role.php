<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $primaryKey = 'admin_role_id';
    protected $table = 'admin_roles';
    protected $fillable = ['admin_role_title', 'admin_role_status', 'admin_role_created_by'];

    public function get_role_by_id($id) {
        return Role::find($id);
    }

    public function get_access($admin_role_id) {
        $moduleData = ModuleAccess::where('admin_role_id', $admin_role_id)->get();
        $data = array();
        foreach ($moduleData as $v) {
            $data[] = $v['module'] . '/' . $v['operation'];
        }
        return $data;
    }

    public function set_access($roleid, $module, $operation, $status) {
        if ($status == 1) {           
            $moduleAccess = new ModuleAccess([
                'admin_role_id' => $roleid,
                'module' => $module,
                'operation' => $operation,
            ]);
            $moduleAccess->save();
        } else {
            ModuleAccess::where('admin_role_id', $roleid)
                    ->where('module', $module)
                    ->where('operation', $operation)
                    ->delete();
        }
    }

}
