@section('aside')
    <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="" class="site_title"><i class="fa fa-paw"></i> <span>GiftShift</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="{{url('lib/uploads/images/admins/'.Auth::guard('admin')->user()->image)}}" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Welcome,</span>

                    <h2>{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</h2>
                </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                    <h3>General</h3>
                    <ul class="nav side-menu">
                        <li><a href="{{route('admin')}}"> <i class="fa fa-dashboard"></i> Dashboard </a>

                        <li><a href="{{route('privileges')}}"> <i class="fa fa-lock"></i> Privilege </a></li>



                        <li><a><i class="fa fa-users"></i> User <span class="fa fa-chevron-down"></span></a>

                            <ul class="nav child_menu">
                                <li><a href="{{route('add-user')}}">Add User</a></li>
                                <li><a href="{{route('users')}}"> Show User</a></li>
                            </ul>
                        </li>


                        <li><a><i class="fa fa-image"></i> Slider <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-slider')}}">Add Slider</a></li>
                                <li><a href="{{route('slider')}}">Show Slider</a></li>

                            </ul>
                        </li>


                        <li><a><i class="fa fa-list"></i> Menu <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-menu')}}">Add Menu</a></li>
                                <li><a href="{{route('menu')}}">Show Menu</a></li>

                            </ul>
                        </li>


                        <li><a><i class="fa fa-navicon"></i> Sub Menu <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-submenu')}}"> Add Sub-Menu</a></li>
                                <li><a href="{{route('submenu')}}"> Show Sub-menu</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-navicon"></i> Category<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-category')}}"> Add Category</a></li>
                                <li><a href="{{route('category')}}"> Show Category</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-navicon"></i> Product<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('add-product')}}"> Add Product</a></li>
                                <li><a href="{{route('product')}}"> Show Product</a></li>
                            </ul>
                        </li>

                        <li><a><i class="fa fa-user"></i> Customer <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('customer-list')}}">Show Customer</a></li>

                            </ul>
                        </li>
                        <li><a><i class="fa fa-first-order"></i> Order <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="{{route('order-list')}}">Show Order</a></li>

                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
        </div>

    </div>



@stop
