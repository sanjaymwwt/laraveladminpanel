<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    protected $primaryKey = 'module_id';
    protected $table = 'module';
    protected $fillable = ['module_name','controller_name', 'operation'];

}
