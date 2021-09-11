<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('dashboard')}}"><img src="{{asset('images/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item @if(Request::segment(2) == 'dashboard') active @endif" >
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(2) == 'car-make') active @endif">
                    <a href="{{route('car-make.index')}}" class='sidebar-link'>
                        <i class="bi bi-gear-fill"></i>
                        <span>Car Make</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(2) == 'car-model') active @endif">
                    <a href="{{route('car-model.index')}}" class='sidebar-link'>
                        <i class="bi bi-subtract"></i>
                        <span>Car Model</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(2) == 'car') active @endif">
                    <a href="{{route('car.index')}}" class='sidebar-link'>
                        <i class="bi bi-truck"></i>
                        <span>Car</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(2) == 'homepage-banner') active @endif">
                    <a href="{{route('homepage_banner.index')}}" class='sidebar-link'>
                        <i class="bi bi-image"></i>
                        <span>Homepage Banner</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(2) == 'video-link') active @endif">
                    <a href="{{route('video_link.index')}}" class='sidebar-link'>
                        <i class="bi bi-camera-video"></i>
                        <span>Video Link</span>
                    </a>
                </li>
                <li class="sidebar-item  @if(Request::segment(2) == 'settings') active @endif">
                    <a href="{{route('settings.index')}}" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/admin/support')}}" class='sidebar-link'>
                        <i class="bi bi-chat"></i>
                        <span>Chat</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{url('/translations')}}" class='sidebar-link'>
                        <i class="bi bi-wrench"></i>
                        <span>Translations</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
