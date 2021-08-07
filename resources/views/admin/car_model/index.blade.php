@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/dripicons.css')}}">
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
                        <h3>Car Model</h3>
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
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('car-model.create')}}" class="btn btn-primary ">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Car Make</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($car_models as $car_model)
                            <tr>
                                <td>{{$car_model->name}}</td>
                                <td>
                                    {{$car_model->carMake->name}}
                                    <img class="img-fluid" width="50" src="{{$car_model->carMake->image}}" alt="{{$car_model->carMake->image}}-image">
                                </td>
                                <td>
                                    <span class="row">
                                        <a class="col-6" href="{{route('car-model.edit', $car_model->id)}}">
                                            <div class="icon dripicons-pencil"></div>
                                        <a>
                                         <form  method="post" action="{{ route('car-model.delete', $car_model->id) }}">
                                        @csrf
                                             @method('delete')
                                        <a onclick="if(confirm('Are you sure you want to delete ' + `{{$car_model->name}}` + '?')) { $(this).closest('form').submit()};"><div class="icon dripicons-trash"></div></a>
                                        </form>
                                    </span>
                                    <span>

                                    </span>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection
