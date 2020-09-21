<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;


class Company extends Model {

    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'mobile_no', 'address1', 'address2','created_date'];

}
