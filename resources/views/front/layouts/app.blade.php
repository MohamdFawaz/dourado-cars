@include('front.layouts.head')
@if(!isMobileWebviewSource())
    @include('front.layouts.header')
@endif
@yield('content')

@if(!isMobileWebviewSource())
    @include('front.layouts.footer')
@endif
@include('front.layouts.foot')
