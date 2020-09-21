<?php

namespace App\Http\Controllers\backend\UI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UiController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //return view('backend.charts.chartjs');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function general()
    {
        return view('backend.ui.general');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        return view('backend.ui.icons');
    }
    public function buttons()
    {
        return view('backend.ui.buttons');
    }
    public function sliders()
    {
        return view('backend.ui.sliders');
    }
    public function timeline()
    {
        return view('backend.ui.timeline');
    }
    public function modals()
    {
        return view('backend.ui.modals');
    }
}
