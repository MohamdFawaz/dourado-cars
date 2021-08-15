<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{asset('images/logoWText-min.png')}}" alt="header-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:void(0)">{{trans('web.menus.home')}}
                            <span class="sr-only"></span>
                        </a>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{trans('web.menus.cars')}}</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">More</a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Blog</a>
                            <a class="dropdown-item" href="javascript:void(0)">Team</a>
                            <a class="dropdown-item" href="javascript:void(0)">Testimonials</a>
                            <a class="dropdown-item" href="javascript:void(0)">Terms</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{trans('web.menus.about_us')}}</a></li>

                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{trans('web.menus.sell_a_car')}}</a></li>

                    <li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{trans('web.menus.contact_us')}}</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
