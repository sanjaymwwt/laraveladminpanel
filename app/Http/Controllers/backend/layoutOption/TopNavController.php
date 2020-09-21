<?php

namespace App\Http\Controllers\backend\layoutOption;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopNavController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.layoutOption.topnav');
    }
}
