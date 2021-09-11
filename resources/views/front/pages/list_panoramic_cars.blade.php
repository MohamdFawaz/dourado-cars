@extends('front.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/jquery-nice-select-1.1.0/css/nice-select.css')}}">
@endsection

@section('title')
    <title>{{trans('web.title.cars')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <div class="page-heading about-heading header-text"
         style="background-image: @if(isset($coverImage)) url({{$coverImage}}) @else url({{asset('images/front/car-header.jpeg')}}); @endif">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{trans('web.pages.list_panoramic_cars.upper_title')}}</h4>
                        <h2>{{trans('web.pages.list_panoramic_cars.lower_title')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="row">
                @if(true)
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($cars as $car)
                                <div class="col-md-4">
                                    @include('front.components.panoramic_car_item', $car)
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-6">
                        <div class="row">
                            <img src="{{asset('images/front/no-search-result.webp')}}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

