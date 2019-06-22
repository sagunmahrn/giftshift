<?php

namespace App\Http\Controllers\frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserRegisterController extends FrontendController
{
    public function register(Request $request){
        if($request->isMethod('get')){
            return view($this->pagepath.'users.register',$this->data);

        }
        if($request->isMethod('post')){
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['password']=bcrypt($request->password);
            if(User::create($data)){
                return redirect()->back()->with('success','User was inserted');
            }
        }
    }
}
