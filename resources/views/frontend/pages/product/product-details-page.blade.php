@extends('frontend.master.master')
@section('content')
    <div class="">



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        {{$productDetailsData->name}}

                        <img src="{{url('lib/uploads/images/product/'.$productDetailsData->image)}}" class="img-responsive">

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop