@extends('frontend.master.master')
@section('content')
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><a href="">{{$sliderData->title}}</a></h1>
                    <a href="">{{$sliderData->created_at->diffForHumans()}}</a>

                        <img src="{{url('lib/uploads/images/sliders/'.$sliderData->image)}}" class="img-responsive">
                    <p>
                    <a href="">{!! $sliderData->description!!}</a>
                    </p>
                </div>
            </div>
        </div>
    </section>




@stop