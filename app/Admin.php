<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends \Illuminate\Foundation\Auth\User
{
    protected $fillable=['name','username','email','password','image','status','user_type'];

    public function privilege(){
        return $this->belongsToMany('App\Privileges','manage_privilege','admin_id','privilege_id','id');
    }
}
