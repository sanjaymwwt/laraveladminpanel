<?php

namespace App\Http\Controllers\backend\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
//return view('backend.charts.chartjs');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function invoice() {
        return view('backend.pages.invoice');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function profile() {
        return view('backend.pages.profile');
    }

    public function login() {
        return view('backend.pages.login');
    }

    public function register() {
        return view('backend.pages.register');
    }

    public function lockscreen() {
        return view('backend.pages.lockscreen');
    }

    public function error404() {
        return view('backend.pages.error404');
    }

    public function error500() {
        return view('backend.pages.error500');
    }

    public function blank() {
        return view('backend.pages.blank');
    }

    public function pace() {
        return view('backend.pages.pace');
    }

}
