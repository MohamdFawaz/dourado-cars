@extends('admin.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                        <h3>Car Make</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Car Make</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('car-make.create')}}" class="btn btn-primary ">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Activation</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($car_makes as $car_make)
                            <tr>
                                <td>{{$car_make->name}}</td>
                                <td><img class="img-fluid" width="100" src="{{$car_make->image}}" alt="{{$car_make->name}}-image"></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox"
                                               onchange="toggleMakeActivation({{$car_make->id}})" id="flexSwitchCheckChecked"
                                               @if($car_make->activation) checked @endif/>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route('car-make.edit', $car_make->id)}}"><div class="icon dripicons-pencil"></div><a>
                                    </div>
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
    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        toggleMakeActivation = (carMakeId) => {
            const res = axios.put(`{{route('car-make.toggle-activation')}}`, { car_make_id: carMakeId })
                .then(response => console.log(response))
                .catch(error => toastr.error(error.response.data.error));
        }
    </script>
@endsection
