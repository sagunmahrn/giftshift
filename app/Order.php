<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
//    protected $fillable=['name','email','address','country','cart','status'];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
