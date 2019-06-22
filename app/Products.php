<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
   protected $fillable=['name','slug','price','description','image','date','qty','category_id'];
//    protected $fillable=['name','slug','price','description','image','date','qty'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
}