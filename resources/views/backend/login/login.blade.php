<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login</title>
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                <form method="post" action="{{route('admin-login')}}">
                    {{csrf_field()}}

                    <h1>Login Form</h1>
                    <div class="form-group form-group-sm">
                        <input type="text" name='username' class="form-control" placeholder="Username" >
                        <a href="" @style="color:red;">{{$errors->first('username')}}</a>
                    </div>
                    <div class="form-group form-group-sm">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <a href="" @style="color:red;">{{$errors->first('password')}}</a>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="pull-left">
                            <input type="checkbox" name="remember_me">Remember me</label>

                        <button class="btn btn-success btn btn-sm pull-right">Login</button>

                    </div>

                    <div class="clearfix"></div>


                </form>
            </section>
        </div>


    </div>
</div>
</body>
</html>