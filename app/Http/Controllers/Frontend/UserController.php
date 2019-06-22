<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\elementType;

class UserController extends FrontendController
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagepath . 'users.login', $this->data);
        }


        if ($request->isMethod('post')) {
            $email = $request->email;
            $password = $request->password;


            if (Auth::guard('web')->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended(route('index'));
            } else {
                return redirect()->intended(route('login'));
            }
        }


    }

    public  function myaccount(){
        $orders=Auth::guard('web')->user()->orders;
        $orders->transform(function ($order){
            $order->cart=unserialize($order->cart);
            return $order;
        });
        return view($this->pagepath . 'users.account',['orders'=>$orders], $this->data);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->intended(route('login'));
    }
}
