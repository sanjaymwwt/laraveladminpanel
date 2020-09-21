<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MailboxController extends Controller {

    /**
     * @return \Illuminate\View\View
     */
    public function inbox() {        
        return view('backend.mailbox.mailbox');
    }
    public function compose() {     
        return view('backend.mailbox.compose');
    }

    public function read_mail() {
        return view('backend.mailbox.read-mail');
    }

}
