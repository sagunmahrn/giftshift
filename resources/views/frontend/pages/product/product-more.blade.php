@extends('frontend.master.master')
@section('content')
    {{--<section id="aa-product">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="row">--}}
                        {{--<div class="aa-product-area">--}}
                            {{--<div class="aa-product-inner">--}}


                                {{--<!-- Tab panes -->--}}
                                {{--<div class="tab-content">--}}
                                    {{--<!-- Start men product category -->--}}
                                    {{--<div class="tab-pane fade in active" id="men">--}}
                                        {{--<ul class="aa-product-catg">--}}
                                            {{--<!-- start single product item -->--}}
                                            {{--@foreach($productData as $product)--}}
                                                {{--<li>--}}
                                                    {{--<figure>--}}
                                                        {{--<a class="aa-product-img" href="{{route('product-details').'/'.$product->slug}}"><img src="{{url('lib/uploads/images/product/'.$product->image)}}" alt="polo shirt img"></a>--}}
                                                        {{--<a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>--}}
                                                        {{--<figcaption>--}}
                                                            {{--<h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>--}}
                                                            {{--<span class="aa-product-price">{{$product->price}}</span>--}}

                                                        {{--</figcaption>--}}
                                                    {{--</figure>--}}

                                                    {{--<!-- product badge -->--}}
                                                    {{--<span class="aa-badge aa-sale" href="#">SALE!</span>--}}
                                                {{--</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}


    <!-- product category -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">
                        <div class="aa-product-catg-head">
                            <div class="aa-product-catg-head-left">
                                <form action="" class="aa-sort-form">
                                    <label for="">Sort by</label>
                                    <select name="">
                                        <option value="1" selected="Default">Default</option>
                                        <option value="2">Name</option>
                                        <option value="3">Price</option>
                                        <option value="4">Date</option>
                                    </select>
                                </form>
                                <form action="" class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </form>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                            </div>
                        </div>
                        <div class="aa-product-catg-body">
                            <ul class="aa-product-catg">
                                <!-- start single product item -->
                                @foreach($productData as $product)
                                <li>
                                    <figure>
                                        <a class="aa-product-img" href="{{route('product-details').'/'.$product->slug}}">
                                            <img src="{{url('lib/uploads/images/product/'.$product->image)}}" alt="polo shirt img" class="img-responsive"></a>
                                        <a class="aa-add-card-btn"href="{{url('add-to-cart').'/'.$product->id}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                                            <span class="aa-product-price">Rs  {{$product->price}}</span>
                                            {{--<p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>--}}
                                        </figcaption>
                                    </figure>
                                    <!-- product badge -->
                                </li>
                            @endforeach

                            </ul>
                            <!-- quick view modal -->
                            <!-- / quick view modal -->
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Category</h3>
                            <ul class="aa-catg-nav">
                                @foreach($categoryData as $cat)
                                <li><a href="{{route('product-by-category1').'/'.$cat->category_name}}">{{ucfirst($cat->category_name)}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Shop By Price</h3>
                            <!-- price range -->
                            <div class="aa-sidebar-price-range">
                                <form action="">
                                    <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                    </div>
                                    <span id="skip-value-lower" class="example-val">30.00</span>
                                    <span id="skip-value-upper" class="example-val">100.00</span>
                                    <button class="aa-filter-btn" type="submit">Filter</button>
                                </form>
                            </div>

                        </div>
                        <!-- single sidebar -->


                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- / product category -->




@stop