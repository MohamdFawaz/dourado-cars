@include('front.components.sections.visit_our_showroom')
@include('front.components.sections.download_application')
<a href="{{url('support')}}" class="float" target="_blank">
    <i class="fa fa-comment my-float"></i>
</a>
<footer class="footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="widget1">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('images/dourado_logo_transparent.png')}}" class="img-fluid"
                                 alt="footer-logo">
                        </a>
                    </div>
                    <p>
                        {{trans('web.footer_about_us')}}
                    </p>
                    <div class="social-links">
                        <ul>
                            <li>
                                <a href="{{trans('web.header.social_media.facebook')}}">
                                    <i class="fa fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{trans('web.header.social_media.instagram')}}">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{trans('web.header.social_media.twitter')}}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{trans('web.header.social_media.youtube')}}">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="widget3">
                    <h5>
                        {{trans('web.footer.links_header')}}
                    </h5>
                    <ul>
                        <li>
                            <a href="{{url('/')}}">
                                {{trans('web.menus.home')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('list-cars')}}">
                                {{trans('web.menus.cars')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('about')}}">
                                {{trans('web.menus.about_us')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{route('sell-car')}}">
                                {{trans('web.menus.sell_a_car')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="widget4">
                    <h5>
                        {{trans('web.footer.contact_us_header')}}
                    </h5>
                    <ul>
                        <li>
                            <a href="{{trans('web.footer_contact_us_first_address_link')}}">
                                {{trans('web.footer_contact_us_first_address')}}
                            </a>
                        </li>
                        <li>
                            <a href="{{trans('web.footer_contact_us_second_address_link')}}">
                                {{trans('web.footer_contact_us_second_address')}}
                            </a>
                        </li>
                        <li>
                            <a href="tel:{{trans('web.footer_contact_us_number')}}">
                                {{trans('web.footer_contact_us_number')}}
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{trans('web.footer_contact_us_mail')}}">
                                {{trans('web.footer_contact_us_mail')}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="widget4">
                    <h5>
                        {{trans('web.footer.sell_a_car_header')}}
                    </h5>
                    <ul>
                        {{trans('web.footer.get_a')}} <a href="{{route('sell-car')}}">{{trans('web.footer.quote')}}</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right-area">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p>&copy; Copyright All rights reserved {{date('Y')}}.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
