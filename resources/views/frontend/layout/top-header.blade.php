@section('top-header')
    <!-- Start header section -->


    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-top-area">
                            <!-- start header top left -->
                            <div class="aa-header-top-left">
                                <!-- start language -->

                            {{--<!-- start currency -->--}}
                            {{--<div class="aa-currency">--}}
                            {{--<div class="dropdown">--}}
                            {{--<a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1"--}}
                            {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
                            {{--<i class="fa fa-usd"></i>USD--}}
                            {{--<span class="caret"></span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">--}}
                            {{--<li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>--}}
                            {{--<li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <!-- / currency -->

                                <!-- start cellphone -->
                                <div class="cellphone hidden-xs">
                                    <p><span class="fa fa-phone"></span>
                                        <a href="tel:+9779861596592">+9779861596592</a></p>
                                </div>
                                <!-- / cellphone -->
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="aa-head-top-nav-right">
                                    @if(\Illuminate\Support\Facades\Auth::guard('web')->user())
                                        <li><a href="{{route('my-account')}}">My Account</a></li>
                                        <li><a href="">{{\Illuminate\Support\Facades\Auth::guard('web')->user()->email}}</a></li>
                                        <li><a href="{{route('user-logout')}}">Logout</a></li>
                                    @else
                                        <li><a href="{{route('user-register')}}">Register</a></li>
                                        <li><a href="{{route('login')}}">Login</a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->
        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="{{route('index')}}">
                                    <p>Gift<strong>Shift</strong>
                                </a>
                                <!-- img based logo -->

                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->


                            <div class="aa-cartbox">

                                <a class="aa-cart-link" href="{{route('cart')}}">
                                    <span class="fa fa-shopping-basket"></span>
                                    <span class="aa-cart-title">SHOPPING CART</span>
                                    <span class="aa-cart-notify">
                                      {{Session::has('cart') ? Session::get('cart')->totalQty:''}}
                                        {{--{{count(session('cart'))}}--}}
                                    </span>
                                </a>


                                {{--<div class="aa-cartbox-summary">--}}
                                    {{--<ul>--}}

                                    {{--<li>--}}

                                    {{--<a class="aa-cartbox-img" href="#"><img src="" class="img-responsive"></a>--}}
                                    {{--<div class="aa-cartbox-info">--}}
                                    {{--<h4><a href="#"> </a></h4>--}}

                                    {{--</div>--}}
                                    {{--</li>--}}


                                    {{--<li><span class="aa-cartbox-total-title"></span> <span class="aa-cartbox-total-price"></span>--}}
                                    {{--</li>--}}

                                    {{--</ul>--}}

                                    {{--<a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>--}}
                                {{--</div>--}}
                            </div>


                            <!-- / cart box -->
                            <!-- search box -->
                            <div class="aa-search-box">
                                <form action="">
                                    <input type="text" name="search" id="search_data"
                                           placeholder="Search here ex. 'gift' ">
                                </form>
                                <div id="search_all_data"></div>
                            </div>
                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
@stop