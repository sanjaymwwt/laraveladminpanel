<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\User;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\UsersExport;
use Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use DB;
use PDF;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Session;

class ExampleController extends Controller {

    public function __construct(Request $request) {
        // check module view access from here using middleware
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('example', $this->user->admin_role_id);
            if (!in_array('view', $this->users_rights)) {
                $back_to = $_SERVER['REQUEST_URI'];
                $back_to = urlencode($back_to);
                return redirect()->route('access_denied.index', $back_to);
            }
            return $next($request);
        });
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $data['pages'] = Page::all()->toArray();
        return view('backend.frontpage.list', compact('data'));
    }

    /**
     * Add user form
     * @return type
     */
    public function simple_datatable() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $users = User::all()->toArray();
        return view('backend.example.simple_datatable', compact('users'));
    }

    /**
     * datatable display list
     * @return type
     */
    public function ajax_datatable() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        return view('backend.example.ajax_datatable');
    }

    /**
     * pagination display list
     * @return type
     */
    public function pagination() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $users = User::all()->toArray();
        return view('backend.example.pagination', compact('users'));
    }

    /**
     * Advance search display list
     * @return type
     */
    public function advance_search(Request $request) {
        $request->session()->forget('search_form_status');
        $request->session()->forget('user_search_from');
        $request->session()->forget('user_search_to');
        $users = User::all()->toArray();
        return view('backend.example.advance_search', compact('users'));
    }
    /**
     * file upload view here
     * @return type
     */
    public function file_upload() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        return view('backend.example.file_upload');
    }

    /**
     * Image upload here from file upload function
     * @param Request $request
     * @return type
     */
    public function img_upload(Request $request) {
        $response = array();
        $validation = Validator::make($request->all(), [
                    'userfile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validation->passes()) {
            $image = $request->file('userfile');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $new_name);
            $url = URL::to('/public');
            return response()->json([
                        'success' => 'Image Upload Successfully',
                        'image' => '<img src="' . $url . '/uploads/' . $new_name . '" width="300" style="max-height: 300px; max-width: 300px; background-color: #ecf0f5" ><span class="delImg" data-img="' . $new_name . '" onclick="deletImage($(this))">X</span>',
                        'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                        'error' => $validation->errors()->all(),
                        'uploaded_image' => '',
                        'class_name' => 'alert-danger'
            ]);
        }
    }

    /**
     * video upload here from file upload function
     * @param Request $request
     * @return type
     */
    public function videofile_upload(Request $request) {
        $response = array();
        $validation = Validator::make($request->all(), [
                    'userfile' => 'required|mimes:mp4|max:10048'
        ]);
        if ($validation->passes()) {
            $image = $request->file('userfile');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $new_name);
            $url = URL::to('/public');
            return response()->json([
                        'success' => 'Video Upload Successfully',
                        'image' => "<video width='540' height='310' controls autoplay loop>
                                        <source src='" . $url . "/uploads/" . $new_name . "' type='video/mp4'>
                                    </video><span class='delImg' data-img='" . $new_name . "' onclick='deleteVideo($(this))'>X</span>",
                        'class_name' => 'alert-success'
            ]);
        } else {
            return response()->json([
                        'error' => $validation->errors()->all(),
                        'uploaded_image' => '',
                        'class_name' => 'alert-danger'
            ]);
        }
    }
    /**
     * video upload view file
     * @return type
     */
    public function video_upload() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        return view('backend.example.video_upload');
    }

    /**
     * Export to csv file
     */
    public function export_csv() {
        // file name 
        $filename = 'users_' . date('Y-m-d') . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $user_data = DB::table('newusers')
                        ->select("id", "username", "firstname", "lastname", "email", "mobile_no", "created_at")->get();

//        // file creation 
        $file = fopen('php://output', 'w');

        $header = array("ID", "Username", "First Name", "Last Name", "Email", "Mobile_no", "Created Date");
        fputcsv($file, $header);

        foreach ($user_data as $key => $line) {
            $line = (array) $line;
            fputcsv($file, $line);
        }
        fclose($file);

        exit;
    }

    /**
     * Export pdf 
     */
    public function create_users_pdf() {
        $users = User::all()->toArray();
        $pdf = PDF::loadView('backend.example.users_pdf', compact('users'));
        return $pdf->download('users.pdf');
    }

    /**
     * download excel file
     */
    function excelDownload() {
        $users = User::all()->toArray();
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * Check and multidelete record
     */
    public function multidel(Request $request) {
        $id = $request->get('records_to_del');
        foreach ($id as $val) {
            DB::table('newusers')->where('id', $val)->delete();
        }
        Session::flash('success', 'Users deleted successfully');
    }

    /**
     * User Listing using server side 
     * @param Request $request
     * @return type
     */
    public function datatable_json(Request $request) {
        $table_name = 'newusers';
        $query = DB::table('newusers');
        if ($request->session()->has('search_form_status')) {
            $status = trim($request->session()->get('search_form_status'));
            $query->where('is_active', $status);
        }
        if ($request->session()->has('search_form_email')) {
            $email = trim($request->session()->get('search_form_email'));
            $query->where('email', 'LIKE', '%' . $email . '%');
        }
        return Datatables::of($query)
                        ->addColumn('id', function($query) {
                            return '<label class="checkcontainer"><input type="checkbox" name="ids[]" class="chkbox" value="' . $query->id . '"  /> <span class="checkmark"></span></label>';
                        })
                        ->addColumn('is_active', function($query) {

                            $status = ($query->is_active == 1) ? 'checked' : '';
                            return '<input class="tgl_checkbox tgl-ios" data-id="' . $query->id . '" id="cb_' . $query->id . '" type="checkbox" ' . $status . '><label for="cb_' . $query->id . '"></label>';
                        })
                        ->rawColumns(['is_active' => 'is_active', 'id' => 'id'])
                        ->make(true);
    }

    /**
     * datatables session data here
     * @param Request $request
     */
    public function search(Request $request) {
        $status = $request->get('search_form_status');
        $fromdate = $request->get('user_search_from');
        $todate = $request->get('user_search_to');
        $request->session()->put('search_form_status', $status);
        $request->session()->put('user_search_from', $fromdate);
        $request->session()->put('user_search_to', $todate);
    }

    /**
     * User Listing using server side 
     * @param Request $request
     * @return type
     */
    public function advance_datatable_json(Request $request) {
        $table_name = 'newusers';
        $query = DB::table('newusers');
        if ($request->session()->has('search_form_status')) {
            $status = trim($request->session()->get('search_form_status'));
            $query->where('is_active', $status);
        }
        if ($request->session()->has('user_search_from')) {
            $fromDate = trim($request->session()->get('user_search_from'));
            $query->where('created_at', '>=', date('Y-m-d', strtotime($fromDate)));
        }
        if ($request->session()->has('user_search_to')) {
            $toDate = trim($request->session()->get('user_search_to'));
            $query->where('created_at', '<=', date('Y-m-d', strtotime($toDate)));
        }
        return Datatables::of($query)
                        ->addColumn('id', function($query) {
                            return $query->id;
                        })
                        ->addColumn('is_active', function($query) {

                            $status = ($query->is_active == 1) ? 'checked' : '';
                            return '<input class="tgl-ios" type="checkbox" ' . $status . '><label for="cb_' . $query->id . '"></label>';
                        })
                        ->rawColumns(['is_active' => 'is_active', 'id' => 'id'])
                        ->make(true);
    }

    /**
     * Changes status of users listing
     * @param Request $request
     */
    public function change_status(Request $request) {
        $result = 0;
        $users = User::find($request->get('id'));
        $users->is_active = $request->get('status');
        $users->save();
        $result = 1;
        echo json_encode(trim($result));
        exit;
    }

    /*
     * unlink and delete image
     */

    public function DeleteImage(Request $request) {
        $img = $request->get('img');
        $type = $request->get('type');
        if (!empty($img)) {
            if (file_exists(public_path('uploads/') . $img)) {
                unlink(public_path('uploads/') . $img);  // unlink old image
            }
            if ($type == 'image') {
                return redirect()->route('file_upload')
                                ->with('success', 'File deleted successfully!');
            } else {
                return redirect()->route('file_upload')
                                ->with('success', 'Video deleted successfully!');
            }
            return true;
        }
        return false;
    }

}
