@extends('front.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/jquery-nice-select-1.1.0/css/nice-select.css')}}">
@endsection

@section('title')
    <title>{{trans('web.title.cars')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <div class="page-heading about-heading header-text"
         style="background-image: url({{asset('images/front/car-header.jpeg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{trans('web.pages.list_cars.upper_title')}}</h4>
                        <h2>{{trans('web.pages.list_cars.lower_title')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('front.components.sections.advanced_filter')
    <div class="products">
        <div class="container">
            <div class="row">
                @if($cars->total() > 0)
                    <div class="col-md-12">
                        <div class="row">
                            @foreach($cars->items() as $car)
                                <div class="col-md-4">
                                    @include('front.components.car_item', $car)
                                </div>
                            @endforeach
                            <div class="col-md-12">
                                {{ $cars->links('pagination::cars-paginator') }}
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="row">
                            <img src="{{asset('images/front/no-search-result.webp')}}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('select').niceSelect();
            $("#slider-range").slider({
                range: true,
                min: {{$priceRange->min_price}},
                max: {{$priceRange->max_price}},
                values: [{{$priceRange->min_price}}, {{$priceRange->max_price}}],
                animate: "slow",
                slide: function (event, ui) {
                    $("#price-range").val(ui.values[0] + " {{trans('web.currency_name')}}" + " - " + ui.values[1] + " {{trans('web.currency_name')}}");
                }
            });
            $("#price-range").val($("#slider-range").slider("values", 0) + " {{trans('web.currency_name')}}" + " - " +
                $("#slider-range").slider("values", 1) + " {{trans('web.currency_name')}}");
        });
        loadRelatedModels = (e) => {
            let makeId = e.value;
            if (makeId) {
                axios.get('/car-model/car-make/' + makeId).then(response => {
                    emptyCarModelOptions();
                    let data = response.data.data;
                    for (let i = 0; i < data.length; i++) {
                        $("#car_model_id").append(new Option(data[i].name, data[i].id));
                    }
                    $('#car_model_id').niceSelect('update');
                });
            }
        }

        emptyCarModelOptions = () => {
            let el = $("#car_model_id");
            el.empty();
            el.append(new Option("-- {{trans(trans('web.home.filter.car_model.select'))}} --"));
        }
        loadRelatedMakeYears = (e) => {
            let makeId = e.value;
            if (makeId) {
                axios.get('/car-make/years/' + makeId).then(response => {
                    emptyYearsOptions();
                    let data = response.data.data;
                    for (let i = 0; i < data.length; i++) {
                        $("#year").append(new Option(data[i].year, data[i].year));
                    }
                    $('#year').niceSelect('update');
                });
            }
        }

        loadRelatedModelYears = (e) => {
            let modelId = e.value;
            if (modelId) {
                axios.get('/car-model/years/' + modelId).then(response => {
                    emptyYearsOptions();
                    let data = response.data.data;
                    for (let i = 0; i < data.length; i++) {
                        $("#year").append(new Option(data[i].year, data[i].year));
                    }
                    $('#year').niceSelect('update');
                });
            }
        }

        emptyYearsOptions = () => {
            let el = $("#year");
            el.empty();
            el.append(new Option("-- {{trans('web.home.filter.year.select')}} --"));
        }

    </script>
@endsection
