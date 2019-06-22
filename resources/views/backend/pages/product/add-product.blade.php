@extends('backend.master.master')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">


            <div class="clearfix"></div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Product
                    </h2>
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
                        <br>
                        @include('backend.layout.messages')
                        <form action="{{route('add-product')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group form-group-sm">
                                <label for="category_id">Category id</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categoryData as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <a href="" style="color: red">{{$errors->first('category_id')}}</a>
                            </div>

                            <div class="form-group form-group-sm">
                                <label for="name">Name </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                       id="name" value="{{old('name')}}">
                                <a href="" style="color:red;">{{$errors->first('name')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="username">Slug </label>
                                <input type="text"  readonly name="slug" class="form-control"
                                       id="slug" value="{{old('slug')}}">
                                <a href="" style="color:red;">{{$errors->first('slug')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="price">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Enter Price"
                                       id="price" value="{{old('price')}}">
                                <a href="" style="color:red;">{{$errors->first('email')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="description">Description</label>
                               <textarea name="description" class="form-control" placeholder="Enter description"
                                   id="description" value="{{old('description')}}"></textarea>
                                <a href="" style="color:red;">{{$errors->first('description')}}</a>
                            </div>

                            <div class="form-group form-group-sm">
                                <label for="image">Profile Picture</label>
                                <input type="file" name="upload" class="btn btn-default btn-sm"
                                       id="image">
                                <a href="" style="color:red;">{{$errors->first('upload')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Enter date"
                                       id="date" value="{{old('date')}}">
                                <a href="" style="color:red;">{{$errors->first('date')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty" class="form-control" placeholder="Enter qty"
                                       id="qty" value="{{old('qty')}}">
                                <a href="" style="color:red;">{{$errors->first('qty')}}</a>
                            </div>


                            <div class="form-group form-group-sm">
                                <button class="btn btn-success">Add record</button>
                            </div>


                        </form>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- /page content -->
@stop