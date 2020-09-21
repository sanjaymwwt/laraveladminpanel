<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Common extends Model {

    public function get_generate_menu($mst_menu_id) {

        $menu = DB::table('menus')
                ->leftJoin('pages', 'menus.pageid', '=', 'pages.page_id')
                ->select('menu_id as mid,page_id as id,UCASE(page_name) as text')
                ->where('mst_menu_id', $mst_menu_id)
                ->where('parent_id', NULL)
                ->where('active', 1)
                ->get();
    }
    /**
     * Create global function to get setting data
     * @return type
     */
    public function get_setting_data() {
        $result = DB::table('setting')->get();
        $my = array();
        foreach ($result as $key => $value) {
            $value = (array) $value;
            $my[] = array($value['setting_name'] => $value['setting_value']);
        }
        $settings = array();
        foreach ($my as $value) {
            foreach ($value as $key => $value) {
                $settings[$key] = $value;
            }
        }
        return $settings;
    }


}
