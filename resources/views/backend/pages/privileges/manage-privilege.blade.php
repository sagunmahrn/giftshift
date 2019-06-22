@extends('backend.master.master')
@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">


            <div class="clearfix"></div>


            <div class="x_panel">
                <div class="x_title">
                    <h2>Manage Privilege
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
                        <form action="{{route('add-privileges')}}" method="post"
                              class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="privilege_name">Privilege
                                    Name <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="privilege_name" id="privilege_name"
                                           value="{{old('privilege_name')}}"
                                           placeholder="enter your privilege name"
                                           class="form-control col-md-7 col-xs-12">
                                    <a href="" style="...">{{$errors->first('privilege_name')}}</a>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-round">Submit</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <hr>
                                <th>Sno</th>
                                <th>Privilege name</th>
                                <th>Status</th>
                                <th>Create</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($privilegeData as $key=>$Privi)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ucfirst($Privi->privilege_name)}}</td>

                                    <td>
                                        <form action="{{route('update-privilege-status')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="criteria" value="{{$Privi->id}}">
                                            @if($Privi->status==1)
                                                <button name="active" class="btn btn-success btb-xs">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            @else
                                                <button name="inactive" class="btn btn-warning btb-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            @endif
                                        </form>

                                    </td>
                                    <td>{{$Privi->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('edit-privilege').'/'.$Privi->id}}"
                                           class="btn btn-success btn-xs">
                                            <i class="fa fa-edit"></i></a>
                                        <a href="{{route('delete-privilege').'/'.$Privi->id}}"
                                           onclick="return confirm('Are u Sure')" class="fa fa-danger btn-xs">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
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
    <!-- /page content -->
@stop