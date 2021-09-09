@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/pages/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/comparison.css')}}">
    <script src="{{asset('js/pages/modernizr.js')}}"></script>
@endsection
@section('title')
    <title>{{trans('web.title.compare')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
         style="background-image: url({{asset('images/about-us.jpeg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{trans('web.pages.compare.upper_title')}}</h4>
                        <h2>{{trans('web.pages.compare.lower_title')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="app">
        <div class="container">
            <div class="row">
                <section class="mt-5 cd-products-comparison-table">
                    <div class="cd-products-table">
                        <div class="features">
                            <div class="top-info">{{trans('web.page.compare.car')}}</div>
                            <ul class="cd-features-list">
                                <li>{{trans('web.page.compare.make')}}</li>
                                <li>{{trans('web.page.compare.model')}}</li>
                                <li>{{trans('web.page.compare.kilometers')}}</li>
                                <li>{{trans('web.page.compare.year')}}</li>
                                <li>{{trans('web.page.compare.warranty')}}</li>
                                <li>{{trans('web.page.compare.color')}}</li>
                                <li>{{trans('web.page.compare.number_of_doors')}}</li>
                                <li>{{trans('web.page.compare.number_of_cylinders')}}</li>
                                <li>{{trans('web.page.compare.horse_power')}}</li>
                            </ul>
                        </div> <!-- .features -->

                        <div class="cd-products-wrapper">
                            <ul class="cd-products-columns">
                                @foreach($cars as $car)
                                    <li class="product">
                                        <div class="top-info">
                                            <img src="{{$car->image}}" alt="product image">
                                            <h3 title="{{$car->title}}"> {{$car->title}} </h3>
                                        </div> <!-- .top-info -->

                                        <ul class="cd-features-list">
                                            <li>{{$car->carMake->name}}</li>
                                            <li>{{$car->carModel->name}}</li>
                                            <li>{{$car->kilometers}}</li>
                                            <li>{{$car->year}}</li>
                                            <li>{{$car->warranty ? trans('web.page.compare.warranty_yes') : trans('web.page.compare.warranty_no')}}</li>
                                            <li>{{$car->color}}</li>
                                            <li>{{$car->number_of_doors}}</li>
                                            <li>{{$car->number_of_cylinders}}</li>
                                            <li>{{$car->horse_power}}</li>
                                        </ul>
                                    </li> <!-- .product -->
                                @endforeach
                            </ul> <!-- .cd-products-columns -->
                        </div> <!-- .cd-products-wrapper -->

                        <ul class="cd-table-navigation">
                            <li><a href="#0" class="prev inactive">Prev</a></li>
                            <li><a href="#0" class="next">Next</a></li>
                        </ul>
                    </div> <!-- .cd-products-table -->
                </section> <!-- .cd-products-comparison-table -->
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('js/pages/jquery-2.1.4.js')}}"></script>
    <script src="{{asset('js/pages/main.js')}}"></script>
@endsection
