@if(Session::has('success'))
    <div class="alert alert-success">
        <i class="fa fa-check"></i>
        {{Session('success')}}
    </div>
    @endif

@if(Session::has('fail'))
    <div class="alert alert-danger">

        {{Session('fail')}}
    </div>
@endif