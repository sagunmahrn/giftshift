<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $backendPath='backend.';
    protected $pagepath='';
    public function __construct()
    {

        $this->pagepath=$this->backendPath.'pages.';

    }
}
