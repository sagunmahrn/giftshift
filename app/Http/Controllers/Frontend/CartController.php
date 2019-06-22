<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
use App\Products;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends FrontendController
{

//    public function index(){
//
//        $products = Products::all();
//
////        return view('cart', compact('products'));
//
//
//     return view($this->pagepath.'product.cart',$this->data);
//    }
//
//
//    public function cart(){
//        return view ('cart');
//    }
//
//
//    public function addToCart($id){
//        $product=Products::Find($id);
//        if(!$product){
//                abort(404);
//                }
//
//            $cart = session()->get('cart');
//
//            // if cart is empty then this the first product
//            if(!$cart) {
//
//                $cart = [
//                    $id => [
//                        "name" => $product->name,
//                        "quantity" => 1,
//                        "price" => $product->price,
//                        "image" => $product->image
//                    ]
//                ];
//
//                session()->put('cart', $cart);
//
//                return redirect()->back()->with('success', 'Product added to cart successfully!');
//            }
//
//            // if cart not empty then check if this product exist then increment quantity
//            if(isset($cart[$id])) {
//
//                $cart[$id]['quantity']++;
//
//                session()->put('cart', $cart);
//
//                return redirect()->back()->with('success', 'Product added to cart successfully!');
//
//            }
//
//            // if item not exist in cart then add to cart with quantity = 1
//            $cart[$id] = [
//                "name" => $product->name,
//                "quantity" => 1,
//                "price" => $product->price,
//                "image" => $product->image
//            ];
//
//            session()->put('cart', $cart);
//
//            return redirect()->back()->with('success', 'Product added to cart successfully!');
//        }


    public function index()
    {

        if (!Session::has('cart')) {
            return view($this->pagepath . 'product.cart', ['products' => null], $this->data);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view($this->pagepath . 'product.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice], $this->data);
    }


    public function addToCart(Request $request, $id)
    {
        $product = Products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('index', $this->data);
        //return view($this->pagepath.'product.cart',$this->data);
    }

    public function reduceByOne($id){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->reduceByOne($id);
        return redirect()->route('cart',$this->data);
        }

    public function removeItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);

        Session::put('cart',$cart);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('cart',$this->data);

    }



//    public function checkout()
//    {
//
//        $oldCart = Session::get('cart');
//        $cart = new Cart($oldCart);
//        //$total=$cart->totalPrice;
//        return view($this->pagepath . 'checkout.checkout',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],$this->data);
//    }


    public function checkout(Request $request){
        if($request->isMethod('get')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //$total=$cart->totalPrice;
            return view($this->pagepath . 'checkout.checkout',['products' => $cart->items, 'totalPrice' => $cart->totalPrice],$this->data);

        }
        if($request->isMethod('post')){

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $order=new Order();
            $order->cart=serialize($cart);
            $order->address=$request->input('address');
            $order->email=$request->input('email');
            $order->name=$request->input('name');
            $order->country=$request->input('country');

            Auth::guard('web')->user()->orders()->save($order);
//
//            $data['name']=$request->name;
//            $data['email']=$request->email;
//            $data['address']=$request->address;
//            $data['country']=$request->country;
//            $data['cart']=$request->cart;
//
//            if(Order::create($data)){
                return redirect()->back()->with('success','order was purchased successfully');
//            }
        }
    }


}


