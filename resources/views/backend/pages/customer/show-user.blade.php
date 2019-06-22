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

                                        <th>Email</th>

                                        <th>Create</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customerData as $key=>$user)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ucfirst($user->name)}}</td>

                                            <td>{{$user->email}}</td>







                                            <td>{{$user->created_at->diffForHumans()}}</td>
                                            <td>

                                                <a href="{{route('delete-user').'/'.$user->id}}"

                                                   onclick="return confirm('Are you sure?')"
                                                   class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>


                                </table>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->





@endsection