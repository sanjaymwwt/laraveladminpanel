<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\models\User;
use DB;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data['activeusers'] = DB::table('newusers')->where('is_active',1)->count();
        $data['deactiveusers'] = DB::table('newusers')->where('is_active',0)->count();
        $data['totalusers'] = User::all()->count();
        return view('backend.dashboard.dashboard', compact('data'));
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function dashboard2()
    {
        $data['activeusers'] = DB::table('newusers')->where('is_active',1)->count();
        $data['deactiveusers'] = DB::table('newusers')->where('is_active',0)->count();
        $data['totalusers'] = User::all()->count();
        return view('backend.dashboard.dashboard2', compact('data'));
    }
    
}
