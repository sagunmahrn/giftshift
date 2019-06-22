@extends('frontend.master.master')
@section('content')
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>Register</h4>
                                    <form action="{{route('user-register')}}" class="aa-login-form" method="post">
                                        {{csrf_field()}}
                                        <label for="">Name<span>*</span></label>
                                        <input type="text" name="name" placeholder="Username">
                                        <label for="">Email address<span>*</span></label>
                                        <input type="text" name="email" placeholder="Username or email">
                                        <label for="">Password<span>*</span></label>
                                        <input type="password" name="password" placeholder="Password">
                                        <button type="submit" class="aa-browse-btn">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
