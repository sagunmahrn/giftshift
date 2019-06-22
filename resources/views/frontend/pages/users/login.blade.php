@extends('frontend.master.master')
@section('content')
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="aa-login">
                                    <h4>Login</h4>
                                    <form action="{{route('login')}}" method="post" class="aa-login-form">
                                        {{csrf_field()}}
                                        <div class="form group">
                                            <label for="">Email address<span>*</span></label>
                                            <input type="text" name="email" placeholder="Email">

                                        </div>
                                       <div class="form group">
                                           <label for="">Password<span>*</span></label>
                                           <input type="password" name="password" placeholder="Password">
                                       </div>

                                       <div class="form group">
                                        <button type="submit" class="aa-browse-btn">Login</button>
                                        <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
                                       </div>



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
