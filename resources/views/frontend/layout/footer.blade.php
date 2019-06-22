@section('footer')

    <footer id="aa-footer">
        <!-- footer bottom -->
        <div class="aa-footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-top-area">
                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <h3>Main Menu</h3>
                                        <ul class="aa-footer-nav">
                                            <li><a href="{{route('index')}}">Home</a></li>
                                            <li><a href="{{route('product-more')}}">Our Products</a></li>
                                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                                {{--<div class="col-md-3 col-sm-6">--}}
                                    {{--<div class="aa-footer-widget">--}}
                                        {{--<div class="aa-footer-widget">--}}
                                            {{--<h3>Knowledge Base</h3>--}}
                                            {{--<ul class="aa-footer-nav">--}}
                                                {{--<li><a href="#">Delivery</a></li>--}}
                                                {{--<li><a href="#">Returns</a></li>--}}
                                                {{--<li><a href="#">Services</a></li>--}}
                                                {{--<li><a href="#">Discount</a></li>--}}
                                                {{--<li><a href="#">Special Offer</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Useful Links</h3>
                                            <ul class="aa-footer-nav">
                                                <li><a href="#">Site Map</a></li>
                                                <li><a href="#">Search</a></li>
                                                <li><a href="#">Advanced Search</a></li>
                                                <li><a href="#">Suppliers</a></li>
                                                <li><a href="#">FAQ</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="aa-footer-widget">
                                        <div class="aa-footer-widget">
                                            <h3>Contact Us</h3>
                                            <address>
                                                <p> Kathmandu, Nepal</p>
                                                <p><span class="fa fa-phone">
                                                    <a href="tel:+977986058740">+977986058740</a></span></p>
                                                <p><span class="fa fa-phone">
                                                        <a href="tel:+977980151217">+977980151217</a></span></p>

                                                <p><span class="fa fa-envelope"></span>giftshift@gmail.com</p>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom -->
        <div class="aa-footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-footer-bottom-area">
                            <p>Designed by <a href="http://www.markups.io/">abc</a></p>
                            <div class="aa-footer-payment">
                                <span class="fa fa-cc-mastercard"></span>
                                <span class="fa fa-cc-visa"></span>
                                <span class="fa fa-paypal"></span>
                                <span class="fa fa-cc-discover"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery library -->
    <script src="{{url('front/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('front/js/bootstrap.js')}}"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="{{url('front/js/jquery.smartmenus.js')}}"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="{{url('front/js/jquery.smartmenus.bootstrap.js')}}"></script>
    <!-- To Slider JS -->
    <script src="{{url('front/js/sequence.js')}}"></script>
    <script src="{{url('front/js/sequence-theme.modern-slide-in.js')}}"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="{{url('front/js/jquery.simpleGallery.js')}}"></script>
    <script type="text/javascript" src="{{url('front/js/jquery.simpleLens.js')}}"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="{{url('front/js/slick.js')}}"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="{{url('front/js/nouislider.js')}}"></script>
    <!-- Custom js -->
    <script src="{{url('front/js/ajax.js')}}"></script>
    <script src="{{url('front/js/custom.js')}}"></script>
    <script>
        let Token  = "{{csrf_token()}}";
        let URL = "{{url('/')}}"

    </script>

    </body>
    </html>
@endsection