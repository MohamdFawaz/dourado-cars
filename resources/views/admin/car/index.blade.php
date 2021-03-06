@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('css/pages/dripicons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
                        <h3>Car</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Car</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('car.create')}}" class="btn btn-primary ">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Car Make - Car Model</th>
                                <th>Most Popular</th>
                                <th>Sold</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{$car->name}}</td>
                                    <td><img src="{{$car->image}}" alt="{{$car->name}}-image" class="img-fluid"
                                             width="100"></td>
                                    <td>
                                        {{$car->carMake->name}} - {{$car->carModel->name}}
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                   onchange="toggleFeatured(this,{{$car->id}})" id="flexSwitchCheckChecked"
                                                   @if($car->featured) checked @endif/>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"
                                                   onchange="toggleSold(this,{{$car->id}})"
                                                   @if($car->is_sold) checked @endif/>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('car.edit', $car->id)}}" class="float-start m-2">
                                            <div class="icon dripicons-pencil"></div>
                                            <a>
                                                <form method="post" action="{{ route('car.delete', $car->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <a class="float-start m-2"
                                                       onclick="if(confirm('Are you sure you want to delete ' + `{{$car->name}}` + '?')) { $(this).closest('form').submit()}">
                                                        <div class="icon dripicons-trash"></div>
                                                    </a>
                                                </form>
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
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        toggleFeatured = (e,carId) => {
            axios.put(`{{route('car.toggle-featured')}}`, {car_id: carId})
                .then(response => console.log(response),
                    error => {
                        toastr.error(error.response.data.error);
                        $(e).prop('checked', !e.checked);
                    });
        }
        toggleSold = (e,carId) => {
            axios.put(`{{route('car.toggle-sold')}}`, {car_id: carId})
                .then(response => console.log(response),
                    error => {
                        toastr.error(error.response.data.error);
                        $(e).prop('checked', !e.checked);
                    });
        }

    </script>
@endsection
