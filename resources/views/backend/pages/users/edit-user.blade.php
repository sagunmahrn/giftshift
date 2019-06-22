@extends('backend.master.master')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">


            <div class="clearfix"></div>


            <div class="x_panel">
                <div class="x_title">
                    <h2>Manage User
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

                        <form action="{{route('edit-user-action')}}" method="post" class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <input type="hidden" name="criteria" value="{{$usersData->id}}">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                    Name <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" id="name"
                                           value="{{$usersData->name}}"
                                           placeholder="enter your  name"
                                           class="form-control col-md-7 col-xs-12">
                                    <a href="" style="...">{{$errors->first('name')}}</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Username">User
                                    Name <span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="username" id="username"
                                           value="{{$usersData->username}}"
                                           placeholder="enter your user name"
                                           class="form-control col-md-7 col-xs-12">
                                    <a href="" style="...">{{$errors->first('username')}}</a>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Username">Email <span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="email" id="email"
                                           value="{{$usersData->email}}"
                                           placeholder="enter your email"
                                           class="form-control col-md-7 col-xs-12">
                                    <a href="" style="...">{{$errors->first('email')}}</a>
                                </div>

                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-round">Update</button>


                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@stop