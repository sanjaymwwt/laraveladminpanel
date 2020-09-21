<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Menu;
use App\Http\models\MasterMenu;
use App\Http\models\Page;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use DB;

class MenuController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $menu = new Menu;
        $data['menus'] = Menu::all()->toArray();
        $data['menu_asc_id'] = $menu->get_all_records();

        $data['records'] = Page::all()->toArray();

        if ($request->get('hidden_mst_menu_id_post')) {
            $mst_menu_id = $request->get('hidden_mst_menu_id_post');
        } else {
            $mst_menu_asc_id = $menu->get_all_records();
            $mst_menu_id = $mst_menu_asc_id->id;
        }
        $menu_arr = $menu->get_generate_menu($mst_menu_id);

        if (!$menu_arr->isEmpty()) {
            $i = 0;
            foreach ($menu_arr as $value) {
                $value = (array) $value;
                if (!empty($menu->get_sub_menu1($value['mid'], $mst_menu_id))) {
                    $menu_arr[$i]->children = $menu->get_sub_menu1($value['mid'], $mst_menu_id);
                }
                $i++;
            }
        }
        $data["menu_arr"] = json_encode($menu_arr);

        $data['mst_menu_list'] = MasterMenu::all()->toArray();
        $data['mst_menu_asc_id'] = $mst_menu_id;

        return view('backend.menus.list', compact('data'));
    }

    /**
     * Add Menu form from popup
     * @return type
     */
    function save_menu_name(Request $request) {
        $menu = new Menu;
        $menu_name = trim($request->get('menu_name'));
        $response = array();
        if ($menu_name != '') {
            $id = '-1';
            $table_name = 'mst_menu';
            $where = array('menu_name' => $menu_name);
            $result = $menu->check_exists($menu_name, $id);
            if ($result) {
                $menuResult = MasterMenu::create(['menu_name' => $menu_name]);
                $insert_id = $menuResult->menu_id;
                $html = "<option value='" . $insert_id . "'>" . $menu_name . "</option>";
                $response['success'] = 'success';
                $response['option'] = "<option value='" . $insert_id . "'>" . $menu_name . "</option>";
            } else {
                $response['error'] = 'error';
            }
        }
        echo json_encode($response);
        exit;
    }

    /**
     * Add page in menu here
     */
    public function add_menu(Request $request) {
        $menu = new Menu;
        if ($request->get('pageid') != '') {
            $menu->add_menu($request->get('pageid'), trim($request->get('hidden_mst_menu_id')));

//            return redirect()->route('menus')
//                            ->with('success', 'Page added successfully.');
            Session::flash('success', 'Page added successfully.');  
        } else {
//            return redirect()->route('menus')
//                            ->with('error', 'Please select at least 1 page.');
            Session::flash('error', 'Please select at least 1 page.'); 
        }
    }

    /**
     * Delete page here
     */
    public function delete_menu_page(Request $request) {
        $id = $request->get('mid');
        DB::table('menus')->where('menu_id', $id)->delete();
        DB::table('menus')->where('parent_id', $id)->delete();
//        return redirect()->route('menus')
//                            ->with('success', 'Page deleted successfully.');
        Session::flash('success', 'Page deleted successfully.');  
    }

    /**
     * Menu reset here
     */
    public function reset_list(Request $request) {
        $mst_menu_id = $request->get('mst_menu_id');

        DB::table('menus')->whereIn('mst_menu_id', array($mst_menu_id))->delete();        
        Session::flash('success', 'Menu reset successfully!');  
    }

    /**
     * delete menu here
     */
    function delete_main_menu(Request $request) {
        $menu = new Menu;
        $menu_name = trim($request->get('menu_name'));
        $response = array();
        if ($menu_name != '') {
            $id = '-1';
            $table_name = 'mst_menu';
            $where = array('menu_name' => $menu_name);
            $result = $menu->check_exists($menu_name, $id);
            if ($result) {
                DB::table('mst_menu')->where('id', $menu_name)->delete();
                DB::table('menus')->where('mst_menu_id', $menu_name)->delete();
                $response['success'] = 'success';
                
            } else {
                $response['error'] = 'error';
            }
        }
        Session::flash('success', 'Menu delete successfully!');  
        echo json_encode($response);        
    }

    /**
     * Save menu here
     */
    public function save_menu(Request $request) {
        $menu = new Menu;
        $mst_menu_id = $request->get('mst_menu_id');
        $menu_name = $request->get('menu_name');
//        $this->menu_model->reset_list($mst_menu_id);
        $arrs = json_decode($request->get('text'), true);
        $order_no = 1;

        if (!empty($arrs)) {
            $order_no = 1;
            foreach ($arrs as $value) {
                $menu->update_order($value['mid'], $order_no, '', $mst_menu_id);
                if (isset($value['children'])) {
                    $menu->update_order1($value, $mst_menu_id);
                }
                $order_no++;
            }
        }
        // Update Menu Name 
        $mastermenu = MasterMenu::find($mst_menu_id);
        $mastermenu->menu_name = $menu_name;
        $mastermenu->save();
        Session::flash('success', 'Menu save successfully!');        
        echo "success";
    }

}
