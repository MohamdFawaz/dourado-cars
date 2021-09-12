@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/pages/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/comparison.css?v=1.1')}}">
    <script src="{{asset('js/pages/modernizr.js')}}"></script>
@endsection
@section('title')
    <title>{{trans('web.title.compare')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
         style="background-image: @if(isset($coverImage)) url({{$coverImage}}) @else url({{asset('images/about-us.jpeg')}}); @endif">
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

                @if(count($cars))
                    @if(!isMobileWebviewSource())
                        <div class="col-12 actions">
                            <a href="javascript:void(0)" onclick="resetAll()" class="reset">Reset</a>
                        </div>
                    @endif
                    <section class="mt-5 cd-products-comparison-table">
                        <div class="cd-products-table">
                            <div class="features">
                                <div class="top-info">{{trans('web.page.compare.car')}}</div>
                                <ul class="cd-features-list">
                                    <li>{{trans('web.page.compare.make')}}</li>
                                    <li>{{trans('web.page.compare.model')}}</li>
                                    <li>{{trans('web.page.compare.price')}}</li>
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
                                        <li class="product" id="car-col-{{$car->id}}">
                                            <div class="top-info">
                                                @if(!isMobileWebviewSource())
                                                    <div class="cross"
                                                         onclick="deleteCarFromCompare({{$car->id}})"></div>
                                                @endif
                                                <img src="{{$car->image}}" alt="product image">
                                                <h3 title="{{$car->title}}"> {{$car->title}} </h3>
                                            </div> <!-- .top-info -->

                                            <ul class="cd-features-list">
                                                <li>{{$car->carMake->name}}</li>
                                                <li>{{$car->carModel->name}}</li>
                                                <li>{{$car->price}}</li>
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
                @else
                    <section>
                        <h3 class="text-center mt-5">{{trans('web.page.compare.nothing_to_compare')}}</h3>
                    </section>
                @endif
            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('js/pages/jquery-2.1.4.js')}}"></script>
    <script src="{{asset('js/pages/main.js?v=1.0')}}"></script>
    <script>
        deleteCarFromCompare = (carId) => {
            if (confirm(`{{trans('web.page.compare.are_you_sure_you_want_to_delete')}}`)) {
                var compareCarIds = [];
                compareCarIds = JSON.parse(localStorage.getItem('compareCarIds')) || [];

                let idx = compareCarIds.indexOf(carId.toString());
                if (idx >= 0) {
                    compareCarIds.splice(idx, 1);
                    $('#car-col-' + carId).remove();
                }
                localStorage.setItem('compareCarIds', JSON.stringify(compareCarIds));
                if (compareCarIds.length == 0) {
                    window.location.href = `{{route('compare')}}`
                }
                handleCompare();
            }
        }
        resetAll = () => {
            if (confirm(`{{trans('web.page.compare.are_you_sure_you_want_to_delete_all')}}`)) {
                var compareCarIds = [];
                localStorage.setItem('compareCarIds', JSON.stringify(compareCarIds));
                window.location.href = `{{route('compare')}}`
            }
        }

        function handleCompare() {
            if ($('.compare-nav-item').length) {
                let comparisonCars = JSON.parse(window.localStorage.getItem('compareCarIds'));
                if (comparisonCars != undefined && comparisonCars.length) {
                    $('.compare-nav-item .badge').text(comparisonCars.length);
                    $('.compare-nav-item .badge').css({"display": "block"});
                    let queryParams = '';
                    comparisonCars.forEach(function (carId, idx) {
                        queryParams += queryParams + 'car_id[]=' + carId
                        if (idx != comparisonCars.length - 1) {
                            queryParams += "&";
                        }
                        if ($('.compare').length && $('.compare').data('car-id') == carId) {
                            $('.compare button').text(`{{trans('web.page.car_details.added_to_compare')}}`);
                        }
                    });

                    $('.compare-nav-item a').attr("href", "/compare?" + queryParams + "");

                } else {
                    $('.compare-nav-item .badge').css({"display": "none"});
                    $('.compare-nav-item a').attr("href", "/compare");
                }
            }
        }
    </script>
@endsection
