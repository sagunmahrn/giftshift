<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends BackendController
{
    public function index(){
        return view($this->pagepath.'dashboard.dashboard',$this->data);
    }


    public function CustomerList(){
        $cusData=User::all();
        $this->data('customerData',$cusData);
        return view ($this->pagepath.'customer.show-user',$this->data);
    }

    public function OrderList(){
        $orderData=Order::all();

        $orders->transform(function ($order,$key){
            $order->cart=unserialize($order->cart);
            return $order;
        });
//        return view($this->pagepath . 'users.account',['orders'=>$orders], $this->data);
        $this->data('orderData',$orderData);
        return view ($this->pagepath.'order.show-order',$this->data);
    }
}
