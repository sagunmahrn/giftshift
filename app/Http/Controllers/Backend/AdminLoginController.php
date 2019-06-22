<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends BackendController
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->backendPath . 'login.login');
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required',
            ]);
            $username = $request->username;
            $password = $request->password;
            $remember = isset($request->remember_me) ? true : false;

            if (Auth::guard('admin')->attempt(['username' => $username, 'password' => $password], $remember)) {

                return redirect()->intended(route('admin'));
            }
            else {
                return redirect()->route('admin-login');
            }
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->intended(route('admin-login'));
    }
}
