<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Page;
use Yajra\DataTables\Facades\DataTables;
use DB;

class PageController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
        $data['pages'] = Page::all()->toArray();        
        return view('backend.frontpage.list', compact('data'));
    }

    /**
     * Add user form
     * @return type
     */
    public function create() {
        return view('backend.frontpage.create', array('title' => ' Add Page'));
    }

    /**
     * Edit user form
     * @return type
     */
    public function edit($id) {
        $data['pages'] = Page::find($id);        
        return view('backend.frontpage.edit', array('title' => 'Edit Page'), compact('data'));
    }

    /**
     * Add Page here
     * @param Request $request
     * @return type
     */
    public function store(Request $request) {
        $page = new Page;
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        if ($request->get('url_type') == 'internal') {
            $url = '';
            $request->validate([
                'page_name' => 'required|unique:pages',
                'target' => 'required',
                'url_type' => 'required',
            ]);
        } else {
            $url = trim($request->get('url'));
            $request->validate([
                'page_name' => 'required|unique:pages',
                'target' => 'required',
                'url_type' => 'required',
                'url' => 'required|regex:' . $regex
            ]);
        }
        $unique_slug = $request->get('identifier');
        if ($unique_slug) {    // Hidden value
            $unique_slug = $page->get_unique_slug($unique_slug);
        }
        $page = new Page([
            'page_name' => trim($request->get('page_name')),
            'page_url' => $url,
            'page_target' => $request->get('target'),
            'page_description' => $request->get('page_description'),
            'status' => $request->get('page_status'),
            'url_type' => $request->get('url_type'),
            'page_slug' => $unique_slug,
            'updated_at' => '',
        ]);        
        $page->save();
        return redirect()->route('front_pages')->with('success', 'Page Added successfully');
    }
    /**
     * update page content here
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function update(Request $request, $id) {

        $page = new Page;
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        if ($request->get('url_type') == 'internal') {
            $url = '';
            $request->validate([
                'page_name' => 'required|unique:pages,page_name,' . $id . ',page_id',
                'target' => 'required',
                'url_type' => 'required',
            ]);
        } else {
            $url = trim($request->get('url'));
            $request->validate([
                'page_name' => 'required|unique:pages,page_name,' . $id . ',page_id',
                'target' => 'required',
                'url_type' => 'required',
                'url' => 'required|regex:' . $regex
            ]);
        }        
        $unique_slug = $request->get('identifier');
        if ($unique_slug) {    // Hidden value
            $unique_slug = $page->get_unique_slug($unique_slug, $id);
        }
        if (!empty($id)) {
            $page = Page::find($id);
            $page->page_name = trim($request->get('page_name'));
            $page->page_target = $request->get('target');
            $page->url_type = $request->get('url_type');
            $page->page_description = $request->get('page_description');
            $page->status = $request->get('page_status');
            $page->page_url = $url;
            $page->page_slug = $unique_slug;

            $page->save();
            return redirect()->route('front_pages')->with('success', 'Page Update successfully');
        } else {
            return redirect()->route('front_pages')->with('error', 'Page Update error');
        }
    }

    /**
     * User Listing using server side 
     * @param Request $request
     * @return type
     */
    public function datatable_json(Request $request) {

        $query = DB::table('pages');
        return Datatables::of($query)
                        ->addColumn('status', function($query) {
                            if($query->status == '1')
                                return "Inactive";
                            else
                                return "Active";
                        })
                        ->addColumn('action', function($query) {
                            return '<a href="front_pages/edit/' . $query->page_id . '" title="Edit" class="update btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i></a>';
                        })
                        ->make(true);
    }

    /**
     * Changes status of admin listing
     * @param Request $request
     */
    public function change_status(Request $request) {
        $result = 0;
        $admin = Admin::find($request->get('id'));
        $admin->is_active = $request->get('status');
        $admin->save();
        $result = 1;
        echo json_encode(trim($result));
        exit;
    }

}
