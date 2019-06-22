<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $fillable=['menu_name'];


    public function SubMenu(){
        return $this->hasMany('App\SubMenu');
    }
}
