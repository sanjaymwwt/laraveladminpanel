<?php

namespace App\Http\models;

use Illuminate\Database\Eloquent\Model;

class MasterMenu extends Model {
    
    protected $table = 'mst_menu';
    protected $fillable = ['menu_name'];

}
