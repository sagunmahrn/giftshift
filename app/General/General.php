<?php

namespace App\General;
use Illuminate\Support\Facades\Config;

trait General
{
    public $data=[];

    public function data($key, $value = null)
    {

        return $this->data[$key] = $value;
    }

    public function setTitle($backend,$separator='::',$frontend=null){
        if(!isset($frontend)){
            $frontend=Config::get('title.name');

        }
        return $frontend.$separator.$backend;
    }

}