<div class="product-item">
    <a href="{{route('show-car',$car->id)}}" class="car-anchor">
        <img src="{{$car->image}}" alt="" class="car-image">
        <div class="price">{{$car->price}} {{trans('web.currency_name')}}</div>
    </a>
    <div class="down-content">
        <div class="car-subtitle heading-font">
            <div class="car-name">{{$car->name}}</div>
        </div>
        <a href="{{route('show-car',$car->id)}}"><h4>{{$car->title}}</h4></a>

        <div>
            <p>{{$car->hours_power}} &nbsp;/&nbsp; {{ucwords($car->fuel_type)}} &nbsp;/&nbsp; {{ucwords($car->color)}}
                &nbsp;/&nbsp;{{$car->number_of_cylinders}}</p>
        </div>
        <small class="row">
            <strong class="col-4"><i class="fa fa-dashboard"></i> {{$car->kilometers}} km</strong>
            <strong class="col-4"><i class="fa fa-cog"></i> {{ucwords($car->transmission_type)}}</strong>
            <strong class="col-4"><i class="fa fa-calendar"></i> {{$car->year}}</strong>
        </small>
        <div class="sharethis-inline-share-buttons"></div>

    </div>
</div>
{{--<div class='shareModal'>--}}
{{--    <button class='shareModal__button'>Share</button>--}}
{{--    <div class='shareModal-links'>--}}
{{--        <a href='' title=''><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>--}}
{{--        <a href='' title=''><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37zm1.5-4.87"/></svg></a>--}}
{{--        <a href='' title=''><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg></a>--}}
{{--        <a href='' title=''><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><path d="M22 6l-10 7L2 6"/></svg></a>--}}
{{--        <a href='' title=''><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg></a>--}}
{{--    </div>--}}
{{--    <div class='shareModal-content'>--}}
{{--        <div class='shareModal-content__left'>--}}
{{--            <img src='https://cdn.dribbble.com/users/13307/screenshots/4169591/kids_tv_web_site_games_movies_1x.jpg' alt=''>--}}
{{--        </div>--}}
{{--        <div class='shareModal-content__right'><p>#illustrator #characterdesign #design #character<p></div>--}}
{{--    </div>--}}
{{--    <div class='shareModal-text'>--}}
{{--        <p>I Like it!</p>--}}
{{--        <a href='/' title=''>http://dribbble.com</a>--}}
{{--    </div>--}}
{{--    <a href='' class='shareModal__submit' title=''>Send</a>--}}
{{--</div>--}}
<script async src="https://static.addtoany.com/menu/page.js"></script>
