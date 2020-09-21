<?php

namespace App\Http\Controllers\backend\Charts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MorrisController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.charts.morris');
    }
}
