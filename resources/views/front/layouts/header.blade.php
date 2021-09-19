<header class="main-header">
    <div class="header-top bg-orange">
        <div class="container">
            <div class="top-inner">
                <ul class="top-left">
                    <li><i class="fa fa-phone"></i> <a
                            href="tel:{{trans('web.header.contact_number')}}">{{trans('web.header.contact_number')}}</a>
                    </li>
                </ul>

                <div class="top-right ml-auto">
                    <div class="social-style-one">
                        <a href="{{trans('web.header.social_media.facebook')}}"><i class="fa fa-facebook-f"></i></a>
                        <a href="{{trans('web.header.social_media.instagram')}}"><i class="fa fa-instagram"></i></a>
                        <a href="{{trans('web.header.social_media.twitter')}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{trans('web.header.social_media.youtube')}}"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('images/logoWText-min.png')}}" alt="header-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item @if(Request::segment(1) == '') active @endif">
                        <a class="nav-link" href="{{url('/')}}">{{trans('web.menus.home')}}
                            <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item @if(Request::segment(1) == 'cars') active @endif">
                        <a class="nav-link" href="{{route('list-cars')}}">{{trans('web.menus.cars')}}</a>
                    </li>
                    <li class="nav-item compare-nav-item @if(Request::segment(1) == 'compare') active @endif">
                        <span class="badge badge-pill badge-primary"
                              style="float:right;margin-bottom:-10px;background: #d4af37; display: none">1</span>
                        <a class="nav-link" href="{{route('compare')}}">{{trans('web.menus.compare')}}</a>
                    </li>

                    <li class="nav-item @if(Request::segment(1) == 'about') active @endif">
                        <a class="nav-link" href="{{route('about')}}">
                            {{trans('web.menus.about_us')}}
                        </a>
                    </li>


                    <li class="nav-item @if(Request::segment(1) == 'contact-us') active @endif">
                        <a class="nav-link" href="{{route('contact-us')}}">
                            {{trans('web.menus.contact_us')}}
                        </a>
                    </li>
                    <li class="nav-item @if(Request::segment(1) == 'panoramic-cars') active @endif">
                        <a class="nav-link" href="{{route('list-panoramic-cars')}}">
                            {{trans('web.menus.panoramic-cars')}}
                        </a>
                    </li>
                    <li class="nav-item d-xl-none d-lg-none d-md-none d-sm-block">
                        <a class="nav-link" href="{{route('sell-car')}}">
                            {{trans('web.menus.sell_a_car')}}
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{trans('web.header.language_title')}}</a>

                        <div class="dropdown-menu">
                            @foreach(getLocales() as $locale)
                            <a class="dropdown-item @if(app()->getLocale() == $locale) active @endif" href="{{route('switch-locale', $locale)}}">{{$locale == 'ar' ? trans('web.header.language.arabic') : trans('web.header.language.english') }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
            <div class="custom-button d-lg-block d-md-none d-sm-none d-none">
                <a href="{{route('sell-car')}}">
                    <button class="btn draw-border">{{trans('web.menus.sell_a_car')}}</button>
                </a>
            </div>
        </div>
    </nav>
</header>
