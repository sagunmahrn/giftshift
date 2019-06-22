@extends('frontend.master.master')
@section('content')


    <!-- Start slider -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">

                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        @foreach($sliderData as $slider)
                            <li>
                                <div class="seq-model">
                                    <img data-seq src="{{url('lib/uploads/images/sliders/'.$slider->image)}}" alt="Men slide img" />
                                </div>
                                <div class="seq-title">
                                    {{--<a data-seq href="{{route('slider-details').'/'.$slider->slug}}" class="aa-shop-now-btn aa-secondary-btn">Read More</a>--}}
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->




    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">

                            <!-- start prduct navigation -->

                            <ul class="nav nav-tabs aa-products-tab">
                                @foreach($categoryData as $cat)
                                    <li class="active"><a href="{{route('product-by-category').'/'.$cat->category_name}}">{{$cat->category_name}}</a></li>

                                @endforeach
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start men product category -->
                                <div class="tab-pane fade in active" id="men">
                                    <ul class="aa-product-catg">
                                        <!-- start single product item -->
                                        @foreach($productData as $product)
                                            <li>
                                                <figure>

                                                    <a class="aa-product-img" href="{{route('product-details').'/'.$product->slug}}">
                                                        <img src="{{url('lib/uploads/images/product/'.$product->image)}}"  width="300" height="250"></a>
                                                    <a class="aa-add-card-btn"href="{{url('add-to-cart').'/'.$product->id}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <figcaption>
                                                        <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                                                        <span class="aa-product-price">Rs {{$product->price}}</span>

                                                    </figcaption>
                                                </figure>

                                            </li>

                                        @endforeach
                                        <a class="aa-browse-btn" href="{{route('product-more')}}">Browse all Product <span class="fa fa-long-arrow-right"></span></a>


                                    </ul>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->

    {{--<!-- / popular section -->}--}}
    {{--<section id="aa-popular-category">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="row">--}}
    {{--<div class="aa-popular-category-area">--}}
    {{--<!-- start prduct navigation -->--}}
    {{--<ul class="nav nav-tabs aa-products-tab">--}}
    {{--<li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>--}}
    {{--<li><a href="#featured" data-toggle="tab">Featured</a></li>--}}
    {{--<li><a href="#latest" data-toggle="tab">Latest</a></li>--}}
    {{--</ul>--}}
    {{--<!-- Tab panes -->--}}
    {{--<div class="tab-content">--}}
    {{--<!-- Start men popular category -->--}}
    {{--<div class="tab-pane fade in active" id="popular">--}}
    {{--<ul class="aa-product-catg aa-popular-slider">--}}
    {{--<!-- start single product item -->--}}
    {{--@foreach($productpopularData as $productpopular)--}}
    {{--<li>--}}
    {{--<figure>--}}
    {{--<a class="aa-product-img" href="{{route('product-details').'/'.$productpopular->slug}}">--}}
    {{--<img src="{{url('lib/uploads/images/product/'.$productpopular->image)}}" alt="polo shirt img"></a>--}}
    {{--<a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>--}}
    {{--<figcaption>--}}

    {{--<span class="aa-product-price">{{$productpopular->price}}</span>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}

    {{--<!-- product badge -->--}}
    {{--<span class="aa-badge aa-sale" href="#">SALE!</span>--}}
    {{--</li>--}}
    {{--@endforeach--}}

    {{--</ul>--}}
    {{--<a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>--}}
    {{--</div>--}}
    {{--<!-- / popular product category -->--}}

    {{--<!-- start featured product category -->--}}
    {{--<div class="tab-pane fade" id="featured">--}}
    {{--<ul class="aa-product-catg aa-featured-slider">--}}
    {{--<!-- start single product item -->--}}
    {{--@foreach($productfeatureData as $productfeature)--}}
    {{--<li>--}}
    {{--<figure>--}}
    {{--<a class="aa-product-img" href="{{route('product-details').'/'.$productfeature->slug}}">--}}
    {{--<img src="{{url('lib/uploads/images/product/'.$productfeature->image)}}" alt="polo shirt img"></a>--}}
    {{--<a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>--}}
    {{--<figcaption>--}}
    {{--<h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>--}}
    {{--<span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}

    {{--<!-- product badge -->--}}
    {{--<span class="aa-badge aa-sale" href="#">SALE!</span>--}}
    {{--</li>--}}
    {{--@endforeach--}}

    {{--</ul>--}}
    {{--<a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>--}}
    {{--</div>--}}
    {{--<!-- / featured product category -->--}}

    {{--<!-- start latest product category -->--}}
    {{--<div class="tab-pane fade" id="latest">--}}
    {{--<ul class="aa-product-catg aa-latest-slider">--}}
    {{--<!-- start single product item -->--}}
    {{--@foreach($productlatestData as $productlastest)--}}
    {{--<li>--}}
    {{--<figure>--}}
    {{--<a class="aa-product-img" href="{{route('product-details').'/'.$productlastest->slug}}">--}}
    {{--<img src="{{url('lib/uploads/images/product/'.$productlastest->image)}}" alt="polo shirt img"></a>--}}
    {{--<a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>--}}
    {{--<figcaption>--}}

    {{--<span class="aa-product-price">Rs {{$productlastest->price}}</span>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--<!-- product badge -->--}}
    {{--<span class="aa-badge aa-sale" href="#">SALE!</span>--}}
    {{--</li>--}}
    {{--@endforeach--}}

    {{--</ul>--}}
    {{--<a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>--}}
    {{--</div>--}}
    {{--<!-- / latest product category -->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<!-- / popular section -->--}}





    <!-- footer -->

    <!-- / footer -->



@stop