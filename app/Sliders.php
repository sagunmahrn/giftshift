<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected  $fillable=[
        'title','slug','description','image','status'
    ];
}
