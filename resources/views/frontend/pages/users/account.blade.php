@extends('frontend.master.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-lg-offset-2">
        <h1> My account</h1>
        <hr>
        <h2> My orders</h2>
        @foreach($orders as $order)
        <div class="panel panel-default">
            <div class="panel-body">
                <ul class="list-group">
                    @foreach($order->cart->items as $item)
                    <li class="list-group-item">
                        <span class="badge">  Rs {{$item['price']}}  </span>
                        {{$item['item']['name']}} | {{$item['qty']}} Units
                    </li>
                    @endforeach
                </ul>
            </div>

        <div class="panel-footer">
        <strong>Total Price: Rs {{$order->cart->totalPrice}}</strong>
        </div>
    </div>
    @endforeach
</div>
</div>
@stop
