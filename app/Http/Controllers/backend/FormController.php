<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
       // return view('backend.forms.general');
    }
    public function generalform()
    {
        return view('backend.forms.general');
    }
    public function advance()
    {
        return view('backend.forms.advance');
    }
    public function editors()
    {
        return view('backend.forms.editors');
    }
    public function jqueryValidation(){
        return view('backend.forms.jqueryForm');
    }
}
