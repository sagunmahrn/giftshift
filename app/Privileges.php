<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privileges extends Model
{
    protected $fillable=['privilege_name','status'];
}
