@include('frontend/layout/header')
@include('frontend/layout/footer')
@include('frontend/layout/top-header')
@include('frontend/layout/top-nav')

@yield('header')
@yield('top-header')
@yield('top-nav')
@yield('content')

@yield('footer')