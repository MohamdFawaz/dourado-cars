@extends('front.layouts.app')

@section('title')
    <title>{{trans('web.title.about_us')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url({{asset('images/about-us.jpeg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{trans('web.pages.about.upper_title')}}</h4>
                        <h2>{{trans('web.pages.about.lower_title')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="best-features about-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{trans('web.page.about.section_1_heading')}}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="{{asset('images/front/about_us.jpeg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <p>{{trans('web.page.about.section_1_content')}}</p>
                        <ul class="social-icons">
                            <li><a href="{{trans('web.header.social_media.facebook')}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{trans('web.header.social_media.twitter')}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{trans('web.header.social_media.linkedin')}}"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{trans('web.header.social_media.instagram')}}"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="team-members">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{trans('web.page.about.section_2_heading')}}</h2>
                    </div>
                    <p class="text-center">{{trans('web.page.about.section_2_content')}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
