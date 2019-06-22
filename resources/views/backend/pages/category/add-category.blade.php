@extends('backend.master.master')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Category</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('backend.layout.messages')
                                    <form action="{{route('add-category')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group form-group-sm">
                                            <label for="name">Category name</label>
                                            <input type="text" id="category_name" name="category_name" value="{{old('category_name')}}"
                                                   placeholder="Enter category name" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('category_name')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label for="name">Slug</label>
                                            <input type="text" id="slug" readonly name="slug" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('category_name')}}</a>
                                        </div>


                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Create category</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection