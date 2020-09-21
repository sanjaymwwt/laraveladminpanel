<?php
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessDeniedController extends Controller {

    public function index($back_to = '') {

        return view('access_denied');        
    }

}
