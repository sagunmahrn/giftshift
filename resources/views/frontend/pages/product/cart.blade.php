@extends('frontend.master.master')
@section('content')



<!-- catg header banner section -->


<!-- Cart view section -->
<section id="cart-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="cart-view-area">
                    <div class="cart-view-table">
                        <form action="">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th> Reduce Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Session::has('cart'))
                                        @foreach($products as $product)
                                         <tr>
                                        <td><a href="#"><img src="{{url('lib/uploads/images/product/'.$product['item']['image'])}}" alt="img"></a></td>
                                         <td><a class="aa-cart-title" href="#">{{$product['item']['name']}}</a></td>
                                        <td><i class="fa fa-rupee"> {{$product['item']['price']*$product['qty']}} </i></td>
                                        <td> {{$product['qty']}} </td>
                                             {{--<td><input class="aa-cart-quantity" type="number" value="1"></td>--}}
                                             <td><a href="{{route('reduceByOne',['id'=>$product['item']['id']])}}"  class="btn btn-primary btn-sm"><i
                                                             class="fa fa-plus"></i></a></td>
                                         <td><a href="{{route('remove',['id'=>$product['item']['id']])}}" onclick="return confirm('Are you sure?')" class="btn btn-primary btn-sm"><i
                                                            class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    {{--<tr>--}}
                                        {{--<td colspan="6" class="aa-cart-view-bottom">--}}
                                            {{--<input class="aa-cart-view-btn" type="submit" value="Update Cart"  >--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}

                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <!-- Cart Total view -->
                        <div class="cart-view-total">
                            <h4>Cart Totals</h4>
                            <table class="aa-totals-table">
                                <tbody>
                                <tr>
                                    <th>Total</th>
                                    <td> <i class="fa fa-rupee"> {{$totalPrice}} </i></td>



                                </tr>
                                </tbody>
                            </table>
                            @endif
                            {{--<form action="https://uat.esewa.com.np/epay/main" method="POST">--}}
                            {{--<input value="{{$totalPrice}}" name="tAmt" type="hidden">--}}
                            {{--<input value="{{$totalPrice}}" name="amt" type="hidden">--}}
                            {{--<input value="0" name="txAmt" type="hidden">--}}
                            {{--<input value="0" name="psc" type="hidden">--}}
                            {{--<input value="0" name="pdc" type="hidden">--}}
                            {{--<input value="epay_payment" name="scd" type="hidden">--}}
                            {{--<input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">--}}
                            {{--<input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">--}}
                            {{--<input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">--}}
                            {{--<input value="Submit" type="submit">--}}
                            {{--</form>--}}
                            <a href="{{route('checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Cart view section -->







@stop