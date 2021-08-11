@extends('admin.layouts.app')
@section('content')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Website Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
{{--                                                    <i class="iconly-boldShow"></i>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Car Makes</h6>
                                                <h6 class="font-extrabold mb-0">{{$car_make_count}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
{{--                                                    <i class="iconly-boldProfile"></i>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Car Models</h6>
                                                <h6 class="font-extrabold mb-0">{{$car_model_count}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
{{--                                                    <i class="iconly-boldAdd-User"></i>--}}
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Cars</h6>
                                                <h6 class="font-extrabold mb-0">{{$car_count}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-6 col-lg-3 col-md-6">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-body px-3 py-4-5">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-4">--}}
{{--                                                <div class="stats-icon red">--}}
{{--                                                    <i class="iconly-boldBookmark"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-8">--}}
{{--                                                <h6 class="text-muted font-semibold">Saved Post</h6>--}}
{{--                                                <h6 class="font-extrabold mb-0">112</h6>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </section>
            </div>


        </div>
@endsection

@section('js')
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
@endsection
