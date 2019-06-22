@extends('backend.master.master')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">


            <div class="clearfix"></div>

            <div class="x_panel">
                <div class="x_title">
                    <h2>Add user
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
                        <form action="{{route('add-user')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{--<div class="form-group form-group-sm">--}}
                                {{--<label for="privilege">Privilege </label>--}}
                               {{--<select name="user_type" id="privilege"  class="form-control">--}}
                                   {{--<option value="user">User</option>--}}
                                   {{--<option value="admin">Admin</option>--}}
                                   {{--<option value="super-admin">Super Admin</option>--}}
                               {{--</select>--}}
                                {{--<a href="" style="color:red;">{{$errors->first('privileges')}}</a>--}}
                            {{--</div>--}}
                            <div class="form-group form-group-sm">
                                <label for="privilege">Privileges </label>
                                <select name="user_type" id="privilege"  class="form-control">
                                    @foreach($privilegeData as $privilege)
                                        <option value="{{$privilege->id}}">{{$privilege->privilege_name}}</option>
                                    @endforeach
                                </select>
                                <a href="" style="color:red;">{{$errors->first('privileges')}}</a>
                            </div>


                            <div class="form-group form-group-sm">
                                <label for="name">Name </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                       id="name" value="{{old('name')}}">
                                <a href="" style="color:red;">{{$errors->first('name')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="username">UserName </label>
                                <input type="text" name="username" class="form-control" placeholder="Enter your username"
                                       id="username" value="{{old('username')}}">
                                <a href="" style="color:red;">{{$errors->first('username')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="email">Email </label>
                                <input type="text" name="email" class="form-control" placeholder="Enter your email"
                                       id="email" value="{{old('email')}}">
                                <a href="" style="color:red;">{{$errors->first('email')}}</a>
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="password">Password </label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your Password"
                                       id="password">
                                <a href="" style="color:red;">{{$errors->first('password')}}</a>
                            </div>

                            <div class="form-group form-group-sm">
                                <label for="password_confirmation">Password Confirm</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your Password Confirm"
                                       id="password_confirmation">
                                <a href="" style="color:red;">{{$errors->first('password_confirmation')}}</a>
                            </div>

                            <div class="form-group form-group-sm">
                                <label for="image">Profile Picture</label>
                                <input type="file" name="upload" class="btn btn-default btn-sm"
                                       id="image">
                                <a href="" style="color:red;">{{$errors->first('upload')}}</a>
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