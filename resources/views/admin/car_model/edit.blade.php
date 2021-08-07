@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('vendors/choices.js/choices.min.css')}}">
@endsection
@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Update Car Make</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Car Model</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <section id="basic-vertical-layouts">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Car Model</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-vertical" method="post" action="{{route('car-model.update',$car_model->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Name</label>
                                                        <input type="text" id="first-name-vertical" class="form-control"
                                                               name="name" placeholder="Car Model Name" value="{{$car_model->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="formFileSm" class="form-label">Car Make</label>
                                                    <div class="form-group">
                                                        <select class="choices form-select" name="car_make_id" required>
                                                            <option>-- Choose Car Make --</option>
                                                            @foreach($car_makes as $make)
                                                                <option value="{{$make->id}}" @if($car_model->car_make_id == $make->id) selected @endif>{{$make->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{asset('js/pages/form-element-select.js')}}"></script>
@endsection
