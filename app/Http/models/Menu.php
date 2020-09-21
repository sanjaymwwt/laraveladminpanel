<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model {

    protected $primaryKey = 'menu_id';
    protected $table = 'menus';
    protected $fillable = ['pageid', 'mst_menu_id', 'order_no'];

    public function get_role_by_id($id) {
        return Role::find($id);
    }

    public function get_all_records() {
        return DB::table('mst_menu')->where('status', '1')->first();
    }

    /**
     * Check menu exist for generate menu
     * @param type $mst_menu_id
     * @return type
     */
    public function get_generate_menu($mst_menu_id) {

        $menu = DB::table('menus')
                ->leftJoin('pages', 'menus.pageid', '=', 'pages.page_id')
                ->where('mst_menu_id', $mst_menu_id)
                ->where('parent_id', NULL)
                ->where('active', 1)
                ->get(array('menu_id as mid', 'page_id as id', 'page_name as text'));
        return $menu;
    }

    /**
     * Add submenu here
     * @param type $menu_id
     * @param type $mst_menu_id
     * @return type
     */
    public function get_sub_menu1($menu_id, $mst_menu_id) {

        $submenu_list = DB::table('menus')
                ->leftJoin('pages', 'menus.pageid', '=', 'pages.page_id')
                ->where('mst_menu_id', $mst_menu_id)
                ->where('parent_id', $menu_id)
                ->get(array('menu_id as mid', 'page_id as id', 'page_name as text'));
        $i = 0;
        foreach ($submenu_list as $p_cat) {
            $p_cat = (array) $p_cat;
            if (!empty($this->get_sub_menu1($p_cat['mid'], $mst_menu_id))) {
                $submenu_list[$i]->children = $this->get_sub_menu1($p_cat['mid'], $mst_menu_id);
            }
            $i++;
        }
        return $submenu_list;
    }

    /**
     * check master menu exist or not
     * @param type $menuname
     * @param type $id
     * @return int
     */
    public function check_exists($menuname, $id) {

        $menus = MasterMenu::where('menu_name', $menuname)->count() > 0;

        if (empty($menus)) {
            return 1;
        }
        return 0;
    }

    /**
     * Add new menu from here
     * @param type $page_ids
     * @param type $mst_menu_id
     */
    public function add_menu($page_ids, $mst_menu_id) {
        $count = count($page_ids);
        if ($count != 0) {
            $order = DB::table('menus')
                    ->where('mst_menu_id', $mst_menu_id)
                    ->orderBy('menu_id', 'desc')
                    ->take(1)
                    ->get();

            $order_no = 100;
            if (!$order->isEmpty()) {
                $order_no = $order[0]->order_no + 1;
            }
            foreach ($page_ids as $page_id) {
                $menu = new Menu([
                    'pageid' => $page_id,
                    'active' => 1,
                    'order_no' => $order_no,
                    'mst_menu_id' => $mst_menu_id,
                ]);
                $menu->save();
                $order_no++;
            }
        }
    }

    /**
     * update menu order
     * @param type $menu_id
     * @param type $order_no
     * @param type $parent_id
     * @param type $mst_menu_id
     */
    public function update_order($menu_id, $order_no, $parent_id = "", $mst_menu_id = '') {

        $menu = Menu::find($menu_id);
        $menu->active = 1;
        $menu->order_no = $order_no;
        if ($parent_id != "") {
            $menu->parent_id = $parent_id;
        } else {
            $menu->parent_id = NULL;
        }
        $menu->save();
    }

    /**
     * Update child menu order
     * @param type $value
     * @param type $mst_menu_id
     * @return boolean
     */
    public function update_order1($value, $mst_menu_id) {

        if (!empty($value) && isset($value['children'])) {

            foreach ($value as $k => $v) {
                if ($k == 'children') {

                    $i = 1;
                    foreach ($v as $val) {

                        $menu = Menu::find($val['mid']);
                        if ($value['mid'] != "") {
                            $menu->parent_id = $value['mid'];
                        } else {
                            $menu->parent_id = NULL;
                        }
                        $menu->active = 1;
                        $menu->order_no = $i;
                        $menu->save();

                        if (isset($val['children'])) {
                            $this->update_order1($val, $mst_menu_id);
                        }
                        $i++;
                    }
                }
            }

            return TRUE;
        } else {
            return FALSE;
        }
    }

}
