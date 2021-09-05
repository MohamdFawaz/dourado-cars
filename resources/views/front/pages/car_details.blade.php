@extends('front.layouts.app')

@section('title')
    <title>{{$car->title}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css">
    <link rel="stylesheet" href="{{asset('css/css-fadeshow.min.css')}}">

@endsection
@section('content')
    <div class="page-heading about-heading header-text" style="background-image: url({{$car->image}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4><strong>{{$car->price}} {{trans('web.currency_name')}}</strong></h4>
                        <h2>{{$car->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="slideshow-container">
                        @foreach($car->gallery as $galleryItem)
                        <div class="mySlides fade show">
                            <img src="{{$galleryItem->image}}" class="slider-car-image" >
                        </div>
                        @endforeach

                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>
                    </div>
                </div>
                <div class="col-2 slider-gallery-images">
                    @foreach($car->gallery as $galleryItem)
                        <img src="{{$galleryItem->image}}" class="slider-side-images" onclick="currentSlide({{$loop->iteration}})">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="price-section">
        <div class="container">
            <div class="row">
                <div class="col-12 price text-center">
                    {{$car->price}} {{trans('web.currency_name')}}
                </div>
            </div>
        </div>
    </div>
    <div class="products cars">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-5">
                    <div>
                        <div class="car-subtitle heading-font pull-left">
                            <div class="car-name">{{$car->name}}</div>
                        </div>
                    </div>
                    <a href="{{route('compare')}}">
                        <button class="btn draw-border pull-right">{{trans('web.car_details.compare')}}</button>
                    </a>
                </div>
                <div class="col-md-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.car_make')}}</span>

                                <strong class="pull-right">{{$car->carMake->name}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.car_model')}}</span>

                                <strong class="pull-right">{{$car->carModel->name}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.mileage')}}</span>

                                <strong class="pull-right">{{$car->kilometers}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.year')}}</span>

                                <strong class="pull-right">{{$car->year}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.price')}}</span>

                                <strong class="pull-right">{{$car->price}}</strong>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.has_warranty_label')}}</span>

                                <strong class="pull-right">{{$car->warranty ? trans('web.car_details.has_warranty.yes') : trans('web.car_details.has_warranty.no')}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.color')}}</span>

                                <strong class="pull-right">{{$car->color}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.number_of_doors')}}</span>

                                <strong class="pull-right">{{$car->number_of_doors}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.number_of_cylinders')}}</span>

                                <strong class="pull-right">{{$car->number_of_cylinders}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.horse_power')}}</span>

                                <strong class="pull-right">{{$car->horse_power}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.specs')}}</span>

                                <strong class="pull-right">{{$car->specs}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.transmission_type')}}</span>

                                <strong class="pull-right">{{$car->transmission_type}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.body_type')}}</span>

                                <strong class="pull-right">{{$car->body_type}}</strong>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="clearfix">
                                <span class="pull-left">{{trans('web.car_details.fuel_type')}}</span>

                                <strong class="pull-right">{{$car->fuel_type}}</strong>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>{{trans('web.car_details.additional_information')}}</h2>
                    </div>

                    <div>
                        <p>{{$car->additional_information}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = $('.mySlides')
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex-1].style.display = "block";
        }

    </script>
@endsection
