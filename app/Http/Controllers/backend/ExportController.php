<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Page;
use Spatie;
use DB;
use App\Helpers\Helper;

class ExportController extends Controller {
    
    public function __construct(Request $request) {    
        // check module view access from here using middleware
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('export',$this->user->admin_role_id);            
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
        return view('backend.export.db_export');
    }

    public function dbexport() {  
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        Spatie\DbDumper\Databases\Sqlite::create()
                ->setDbName(database_path('database.sqlite'))
//                ->setUserName('root')
//                ->setPassword('')
                ->dumpToFile('db.sql');
    }

}
