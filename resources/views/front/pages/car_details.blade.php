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
                        <h2>{{$car->name}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row">
{{--                <div class="col-md-12">--}}
{{--                    --}}{{--            <img src="{{$car->image}}" alt="" class="img-fluid wc-image">--}}
{{--                    <div data-am-fadeshow="quick-nav prev-next-nav">--}}

{{--                        <!-- Radio -->--}}
{{--                        @foreach($car->gallery as $galleryItem)--}}
{{--                            <input type="radio" name="css-fadeshow" id="slide-{{$loop->iteration}}"/>--}}
{{--                    @endforeach--}}

{{--                    <!-- Slides -->--}}
{{--                        <div class="fs-slides">--}}
{{--                            @foreach($car->gallery as $galleryItem)--}}
{{--                                <div class="fs-slide"--}}
{{--                                     style="background-image: url({{$galleryItem->image}});">--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

{{--                        <!-- Quick Navigation -->--}}
{{--                        <div class="fs-quick-nav">--}}
{{--                            @foreach($car->gallery as $galleryItem)--}}
{{--                                <label class="fs-quick-btn" for="slide-{{$loop->iteration}}"></label>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

{{--                        <!-- Prev Navigation -->--}}
{{--                        <div class="fs-prev-nav">--}}
{{--                            @foreach($car->gallery as $galleryItem)--}}
{{--                                <label class="fs-prev-btn" for="slide-{{$loop->iteration}}"></label>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

{{--                        <!-- Next Navigation -->--}}
{{--                        <div class="fs-next-nav">--}}
{{--                            @foreach($car->gallery as $galleryItem)--}}
{{--                                <label class="fs-next-btn" for="slide-{{$loop->iteration}}"></label>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

{{--                        <!-- Slide Counter -->--}}
{{--                        <div class="fs-slide-counter">--}}
{{--                            <span class="fs-slide-counter-current"></span>/<span class="fs-slide-counter-total"></span>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
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
    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <a href="{{route('compare')}}">
                        <button class="btn draw-border pull-right">{{trans('web.car_details.compare')}}</button>
                    </a>
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

                    <div class="left-content">
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
