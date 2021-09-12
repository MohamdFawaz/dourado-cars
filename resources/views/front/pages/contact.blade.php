@extends('front.layouts.app')

@section('title')
    <title>{{trans('web.title.contact')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: @if(isset($coverImage)) url({{$coverImage}}) @else url({{asset('images/cars.jpg')}}); @endif">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{trans('web.pages.contact.upper_title')}}</h4>
                        <h2>{{trans('web.pages.contact.lower_title')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="case-details pt-150 rpt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="case-details-content">
                        <div class="section-title text-center">
                            <img src="{{asset('images/1000x-1.jpg')}}" class="img-fluid" style="width: 300px">
                            <h3 class="titillium-font">{{trans('web.pages.contact.dourado_cars_location_title')}}</h3>
                            <p class="text-center">
                                {{trans('web.pages.about.dourado_cars_location_content')}}
                            </p>
                        </div>
                        <ul>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.saturday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.saturday_time_range')}}
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.sunday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.sunday_time_range')}}
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.monday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.monday_time_range')}}
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.tuesday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.tuesday_time_range')}}
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.wednesday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.wednesday_time_range')}}
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.thursday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.thursday_time_range')}}
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-6 text-left">
                                    {{trans('web.page.contact.friday_name')}}
                                </div>
                                <div class="col-6 text-center" style="font-size: smaller">
                                    {{trans('web.page.contact.friday_time_range')}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <img src="{{asset('images/showroom.jpg')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="pt-150 rpt-100">
        <div class="container">
            <h2 class="titillium-font text-center">{{trans('web.page.contact.let_get_in_touch_title')}}</h2>
            <div class="row">
                <div class="col-lg-2 d-sm-none d-md-none">

                </div>
                <div class="col-lg-10 col-sm-12">
                    <div class="wrapper row get-in-touch">
                        <div class="col-12">
                            <ul class="get-in-touch-list">
                                <li>
                                    {{trans('web.page.contact.get_in_touch_title_list_item_1')}}
                                </li>
                                <li>
                                    {{trans('web.page.contact.get_in_touch_title_list_item_2')}}
                                </li>
                                <li>
                                    {{trans('web.page.contact.get_in_touch_title_list_item_3')}}
                                </li>
                                <li>
                                    {{trans('web.page.contact.get_in_touch_title_list_item_4')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
