<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;


class User extends Model {

    protected $table = 'newusers';
    protected $fillable = ['username', 'firstname', 'lastname', 'email', 'mobile_no', 'password', 'address'];

}
