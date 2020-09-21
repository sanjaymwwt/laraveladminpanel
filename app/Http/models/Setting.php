<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;
use DB;


class Setting extends Model {

    protected $table = 'setting';
    protected $primaryKey = 'setting_id';
    protected $fillable = ['setting_id','setting_name', 'setting_value'];
   
}
