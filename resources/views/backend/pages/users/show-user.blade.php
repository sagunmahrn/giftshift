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
                            <h2>Users</h2>
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
                                @include('backend.layout.messages')
                                <table class="table table-hover`">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>User Type</th>
                                        <th>Create</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($usersData as $key=>$admins)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ucfirst($admins->name)}}</td>
                                            <td>{{$admins->username}}</td>
                                            <td>{{$admins->email}}</td>

                                            <td>
                                                <img src="{{url('lib/uploads/images/admins/'.$admins->image)}}" width="30"
                                                     alt="">
                                            </td>

                                            <td>
                                                <form action="{{route('update-user-status')}}" method="post">

                                                    {{csrf_field()}}
                                                    <input type="hidden" name="criteria" value="{{$admins->id}}">
                                                    @if($admins->status==1)
                                                        <button name="active" class="btn btn-success btn-xs">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    @else
                                                        <button name="inactive" class="btn btn-danger btn-xs">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>



                                            <td>
                                                {{--{{$admins->user_type}}--}}
                                                <form action="{{route('update-user-type')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="criteria" value="{{$admins->id}}">
                                                    @if($admins->user_type=='admin')
                                                        <button name="admin" class="btn btn-success btn-xs">
                                                            Admin
                                                        </button>
                                                    @else
                                                        <button name="user" class="btn btn-success btn-xs">
                                                            User
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>{{$admins->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('edit-user').'/'.$admins->id}}"
                                                   class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('delete-user').'/'.$admins->id}}"

                                                   onclick="return confirm('Are you sure?')"
                                                   class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>

                                {{$usersData->render()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->





@endsection