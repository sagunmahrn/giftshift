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
                            <h2>Create New Sub-Category</h2>
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
                                    <form action="{{route('add-submenu')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group form-group-sm">
                                            <label for="menu_id">Menu id</label>
                                            <select name="menu_id" id="menu_id" class="form-control">
                                                {{--<option value="">Select Menu</option>--}}
                                                @foreach($menuData as $menu)
                                                    <option value="{{$menu->id}}">{{$menu->menu_name}}</option>
                                                @endforeach
                                            </select>
                                            <a href="" style="color: red">{{$errors->first('menu_id')}}</a>
                                        </div>


                                        <div class="form-group form-group-sm">
                                            <label for="submenu_name">SubMenu</label>
                                            <input type="text" id="submenu_name" name="submenu_name"
                                                   value="{{old('submenu_name')}}"
                                                   placeholder="Sub-Menu Name" class="form-control">
                                            <a href="" style="color: red">{{$errors->first('submenu_name')}}</a>
                                        </div>



                                        <div class="form-group form-group-sm">
                                            <button class="btn btn-success btn-sm">Create Sub-Menu</button>

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