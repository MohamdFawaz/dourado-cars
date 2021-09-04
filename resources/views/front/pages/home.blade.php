@extends('front.layouts.app')
@section('title')
    <title>{{trans('web.title.home')}} | {{trans('web.title.site_name')}}</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('vendors/jquery-nice-select-1.1.0/css/nice-select.css')}}">
@endsection

@section('content')

    @include('front.components.sections.homepage_banner')

    @include('front.components.sections.most_popular')

    @include('front.components.sections.about_us')

    @include('front.components.sections.latest_car_make')

{{--    @include('front.components.sections.happy_clients')--}}

    @include('front.components.sections.contact')

@endsection

@section('js')
    <script src="{{asset('vendors/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').niceSelect();
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
