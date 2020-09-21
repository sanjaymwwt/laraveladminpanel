<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\Page;
use Yajra\DataTables\Facades\DataTables;
use DB;
use App\Helpers\Helper;

class JoinController extends Controller {

    public function __construct(Request $request) {             
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            $this->users_rights = Helper::check_module_access('joins',$this->user->admin_role_id);            
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

        return view('backend.joins.list');
    }

    /**
     * Listing using server side 
     * @param Request $request
     * @return type
     */
    public function datatable_json(Request $request) {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $query = DB::table('newusers')
                ->leftJoin('payments', 'payments.user_id', '=', 'newusers.id')
                ->get();
        return Datatables::of($query)
                        ->addColumn('amount', function($query) {
                            return $query->grand_total . $query->currency;
                        })
                        ->make(true);
    }
    /**
     * simple datatables display
     * @return type
     */
    public function simple() {
        if (!in_array('view', $this->users_rights)) {
            $back_to = $_SERVER['REQUEST_URI'];
            $back_to = urlencode($back_to);
            return redirect()->route('access_denied.index', $back_to);
        }
        $query = DB::table('newusers')
                ->leftJoin('payments', 'payments.user_id', '=', 'newusers.id')
                ->get();
        $payment_detail = $query;
        return view('backend.joins.simple_join', compact('payment_detail'));
    }

}
