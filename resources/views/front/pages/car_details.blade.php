@extends('front.layouts.app')

@section('title')
    <title>{{$car->title}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
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
        <!-- .gallery-slider -->
            <div class="gallery-slider">
                <!-- __images -->
                <div class="gallery-slider__images">
                    <div>
                    @foreach($car->gallery as $galleryItem)
                        <!-- .item -->
                            <div class="item">
                                <div class="img-fill">
                                    <a href="{{$galleryItem->image}}" target="_blank">
                                        <img src="{{$galleryItem->image}}" alt="{{$galleryItem->id}}-slider-image">
                                    </a>
                                </div>
                            </div>
                            <!-- /.item -->
                        @endforeach
                    </div>
                </div>
                <!-- /__images -->
                <!-- __thumbnails -->
                <div class="gallery-slider__thumbnails">
                    <div>
                    @foreach($car->gallery as $galleryItem)
                        <!-- .item -->
                            <div class="item">
                                <div class="img-fill">
                                    <img src="{{$galleryItem->image}}" alt="{{$galleryItem->id}}-slider-image">
                                </div>
                            </div>
                            <!-- /.item -->
                        @endforeach
                    </div>
                    <button class="prev-arrow slick-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 1792">
                            <path fill="#fff"
                                  d="M1171 301L640 832l531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19L173 877q-19-19-19-45t19-45L915 45q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z"/>
                        </svg>
                    </button>
                    <button class="next-arrow slick-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1280 1792">
                            <path fill="#fff"
                                  d="M1107 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45L275 45q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z"/>
                        </svg>
                    </button>
                </div>
                <!-- /__thumbnails -->
            </div>
            <!-- /.gallery-slider -->
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
                    <a href="javascript:void(0)" class="compare" data-car-id="{{$car->id}}">
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

                                <strong
                                    class="pull-right">{{$car->warranty ? trans('web.car_details.has_warranty.yes') : trans('web.car_details.has_warranty.no')}}</strong>
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
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        function handleCompareHeaderNav() {
            if ($('.compare-nav-item').length) {
                let comparisonCars = JSON.parse(window.localStorage.getItem('compareCarIds'));
                if (comparisonCars.length) {
                    $('.compare-nav-item .badge').text(comparisonCars.length);
                    $('.compare-nav-item .badge').css({"display": "block"});
                    let queryParams = '';
                    comparisonCars.forEach(function (carId, idx) {
                        queryParams += 'car_id[]=' + carId
                        if (idx != comparisonCars.length - 1) {
                            queryParams += "&";
                        }
                    });
                    $('.compare-nav-item a').attr("href", "/compare?" + queryParams + "");
                    if (comparisonCars.length != 0 && comparisonCars.indexOf($('.compare').data('car-id'))) {
                        $('.compare button').text(`{{trans('web.page.car_details.added_to_compare')}}`);
                    } else {
                        $('.compare button').text(`{{trans('web.car_details.compare')}}`);
                    }
                } else {
                    $('.compare-nav-item .badge').css({"display": "none"});
                    $('.compare-nav-item a').attr("href", "/compare");
                }
            }
        }

        $('.compare').on('click', function () {
            let carId = $(this).attr('data-car-id');
            var compareCarIds = [];
            compareCarIds = JSON.parse(localStorage.getItem('compareCarIds')) || [];

            let idx = compareCarIds.indexOf(carId);
            if (idx >= 0) {
                compareCarIds.splice(idx, 1);
            } else {
                compareCarIds.push(carId);
            }
            localStorage.setItem('compareCarIds', JSON.stringify(compareCarIds));
            handleCompareHeaderNav();
        });
        var $imagesSlider = $(".gallery-slider .gallery-slider__images>div"),
            $thumbnailsSlider = $(".gallery-slider__thumbnails>div"),
            $dir = $('html').attr('dir');
        /*
            sliders
        */

        // images options
        $imagesSlider.slick({
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            cssEase: 'linear',
            fade: true,
            draggable: false,
            asNavFor: ".gallery-slider__thumbnails>div",
            prevArrow: '.gallery-slider__images .prev-arrow',
            nextArrow: '.gallery-slider__images .next-arrow',
            rtl: $dir === 'rtl',
        });

        // thumbnails options
        $thumbnailsSlider.slick({
            speed: 300,
            slidesToShow: 5,
            slidesToScroll: 1,
            cssEase: 'linear',
            centerMode: true,
            draggable: false,
            focusOnSelect: true,
            asNavFor: ".gallery-slider .gallery-slider__images>div",
            prevArrow: '.gallery-slider__thumbnails .prev-arrow',
            nextArrow: '.gallery-slider__thumbnails .next-arrow',
            rtl: $dir === 'rtl',
            responsive: [
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 350,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }
            ]
        });


        // // hide the caption before the image is changed
        // $imagesSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
        //     $caption.addClass('hide');
        // });

        // // update the caption after the image is changed
        // $imagesSlider.on('afterChange', function (event, slick, currentSlide, nextSlide) {
        //     captionText = $('.gallery-slider__images .slick-current img').attr('alt');
        //     updateCaption(captionText);
        // });



    </script>
@endsection
