@extends('frontend.master.master')

@section('content')

    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-area">
                        <form action="{{route('checkout')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="checkout-left">
                                        <div class="panel-group" id="accordion">

                                            <!-- Billing Details -->
                                            <div class="panel panel-default aa-checkout-billaddress">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">--}}
                                                            Billing Details

                                                    </h4>
                                                </div>
                                                {{--<div id="collapseThree" class="panel-collapse collapse">--}}
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" name="name" placeholder="Full Name*" required="">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="email" name="email" placeholder="Email Address*" required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="tel" name="phone" placeholder="Phone*" required="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text" name="address" placeholder="Address" required="">
                                                                </div>
                                                            </div>
                                                                <div class="col-md-6">
                                                                <div class="aa-checkout-single-bill">
                                                                    <input type="text"  name="country" placeholder="Country" required="" >
                                                                </div>
                                                                </div>

                                                            </div>
                                                        {{--<div class="row">--}}
                                                            {{--<div class="col-md-12">--}}
                                                                {{--<div class="aa-checkout-single-bill">--}}
                                                                    {{--<select>--}}
                                                                        {{--<option value="0">Select Your Country</option>--}}
                                                                        {{--<option value="1">Australia</option>--}}
                                                                        {{--<option value="2">Nepal</option>--}}
                                                                        {{--<option value="3">USA</option>--}}
                                                                        {{--<option value="4">India</option>--}}
                                                                        {{--<option value="5">China</option>--}}
                                                                        {{--<option value="6">UAE</option>--}}
                                                                        {{--<option value="7">Qatar</option>--}}
                                                                        {{--<option value="8">Malaysia</option>--}}

                                                                    {{--</select>--}}
                                                                    {{--<input type="text" placeholder="Country">--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="row">--}}

                                                            {{--<div class="col-md-6">--}}
                                                                {{--<div class="aa-checkout-single-bill">--}}
                                                                    {{--<input type="text" placeholder="City / Town*">--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-md-6">--}}
                                                                {{--<div class="aa-checkout-single-bill">--}}
                                                                    {{--<input type="text" placeholder="District*">--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}

                                                    </div>

                                                {{--</div>--}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkout-right">
                                        <h4>Order Summary</h4>
                                        <div class="aa-order-summary-area">
                                            <table class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(Session::has('cart'))
                                                    @foreach($products as $product)

                                                        <tr>
                                                    <td> {{$product['item']['name']}}<strong> x  {{$product['qty']}}</strong></td>
                                                    <td ><i class="fa fa-rupee"> {{$product['item']['price']}}</i></td>
                                                </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                {{--<tr>--}}
                                                    {{--<th>Subtotal</th>--}}
                                                    {{--<td>$750</td>--}}
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    {{--<th>Tax</th>--}}
                                                    {{--<td>$35</td>--}}
                                                {{--</tr>--}}
                                                <tr>
                                                    <th>Total</th>
                                                    <td><i class="fa fa-rupee"> {{$totalPrice}} </i></td>
                                                </tr>
                                                </tfoot>
                                                @endif
                                            </table>
                                        </div>
                                        {{--<h4>Payment Method</h4>--}}

                                            {{--<label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label>--}}
                                            {{--<label for="esewa"><input type="radio" id="esewa" name="optionsRadios" checked> Via Esewa </label>--}}
                                            {{--<img src="{{url('lib/uploads/images/logo/esewa.png')}}" border="0" alt="Esewa Acceptance Mark"  width="150" height="80">--}}
                                            {{--<input type="submit" value="Place Order" class="aa-browse-btn" href="{{route('pay',$this->data)}}">--}}


                                    {{--</div>--}}

                                </div>


                            </div>


</div>

                            <div class="col-md-12" >
                                <button type="submit" class="btn btn-primary fa-pull-left">Submit</button>
                            </div>
                        </form>


                    </div>
                        <form action="https://uat.esewa.com.np/epay/main" method="post">
                            <input value="{{$totalPrice}}" name="tAmt" type="hidden">
                            <input value="{{$totalPrice}}" name="amt" type="hidden">
                            <input value="0" name="txAmt" type="hidden">
                            <input value="0" name="psc" type="hidden">
                            <input value="0" name="pdc" type="hidden">
                            <input value="epay_payment" name="scd" type="hidden">
                            <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                            <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                            <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                            <input value="Pay with Esewa" type="submit" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection