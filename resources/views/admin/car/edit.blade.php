@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('vendors/choices.js/choices.min.css')}}">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
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
                        <h3>Edit {{$car->name}} Car</h3>
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

            <section id="basic-vertical-layouts">
                <div class="col-md-12">
                    <form class="form form-vertical" method="post"
                          action="{{route('car.update', $car->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Car</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="car_make_id" class="form-label">Car Make</label>
                                                <div class="form-group">
                                                    <select onchange="loadRelatedModels(this)"
                                                            class="choices form-select"
                                                            name="car_make_id" id="car_make_id" required>
                                                        <option>-- Choose Car Make --</option>
                                                        @foreach($car_makes as $make)
                                                            <option value="{{$make->id}}" @if($car->car_make_id == $make->id) selected @endif>{{$make->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="car_model_id" class="form-label">Car Model</label>
                                                <div class="form-group">
                                                    <select class="form-select" onmousedown="alertToChoose()"
                                                            name="car_model_id" id="car_model_id" required>
                                                        <option>-- Choose Car Model --</option>
                                                        @if($car_models)
                                                            @foreach($car_models as $model)
                                                                <option value="{{$model->id}}" @if($car->car_model_id == $model->id) selected @endif>{{$model->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="kilometers">Kilometers</label>
                                                <input type="number" id="kilometers"
                                                       class="form-control"
                                                       name="kilometers" placeholder="Car Kilometers" required value="{{$car->kilometers}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="year">Year</label>
                                                <input type="text" id="year"
                                                       class="form-control"
                                                       name="year" placeholder="Year" required value="{{$car->year}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" id="price"
                                                       class="form-control"
                                                       name="price" placeholder="Price" required value="{{$car->price}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" @if($car->warranty == true) checked @endif class="form-check-input" id="warranty" name="warranty">
                                                    <label for="warranty">Has Warranty?</label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="color">Color</label>
                                                <input type="text" id="color"
                                                       class="form-control"
                                                       name="color" placeholder="Color" required value="{{$car->color}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="number_of_doors">Number of Doors</label>
                                                <input type="number" id="number_of_doors"
                                                       class="form-control"
                                                       name="number_of_doors" placeholder="Number of Doors" value="{{$car->number_of_doors}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="number_of_cylinders">Number of Cylinders</label>
                                                <input type="text" id="number_of_cylinders"
                                                       class="form-control"
                                                       name="number_of_cylinders" placeholder="Number of Cylinders"
                                                       required value="{{$car->number_of_cylinders}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="hours_power">Hours Power</label>
                                                <input type="text" id="hours_power"
                                                       class="form-control"
                                                       name="hours_power" placeholder="Hours Power" required value="{{$car->hours_power}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image</label>
                                                <input class="form-control" type="file" id="image" name="image">
                                            </div>
                                            @if($car->image)
                                                <img class="mb-2" style="width: 200px" src="{{$car->image}}" alt="{{$car->name}}-image">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach(getLocales() as $locale)
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link @if($loop->first) active @endif" id="{{$locale}}-tab"
                                               data-bs-toggle="tab" href="#{{$locale}}" role="tab"
                                               aria-controls="{{$locale}}"
                                               aria-selected="true">{{ucwords($locale)}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content" id="myTabContent">

                                    @foreach(getLocales() as $locale)
                                        <div class="tab-pane fade @if($loop->first) active show @endif" id="{{$locale}}"
                                             role="tabpanel"
                                             aria-labelledby="{{$locale}}-tab">
                                            <div class="card-body">
                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="name-{{$locale}}">Name</label>
                                                                <input type="text" id="name-{{$locale}}"
                                                                       class="form-control"
                                                                       name="name[{{$locale}}]"
                                                                       placeholder="{{ucwords($locale)}} Car Name" value="{{$car->translate($locale)->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="title-{{$locale}}">Title</label>
                                                                <input type="text" id="title-{{$locale}}"
                                                                       class="form-control"
                                                                       name="title[{{$locale}}]"
                                                                       placeholder="{{ucwords($locale)}} Car Title" value="{{$car->translate($locale)->title}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="specs-{{$locale}}">Specs</label>
                                                                <input type="text" id="specs-{{$locale}}"
                                                                       class="form-control"
                                                                       name="specs[{{$locale}}]"
                                                                       placeholder="{{ucwords($locale)}} Car Specs" value="{{$car->translate($locale)->specs}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="transmission-type-{{$locale}}">Car Transmission Type</label>
                                                                <input type="text" id="transmission-type-{{$locale}}"
                                                                       class="form-control"
                                                                       name="transmission_type[{{$locale}}]"
                                                                       placeholder="{{ucwords($locale)}} Car Transmission Type" value="{{$car->translate($locale)->transmission_type}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="body-type-{{$locale}}">Car Body Type</label>
                                                                <input type="text" id="body-type-{{$locale}}"
                                                                       class="form-control"
                                                                       name="body_type[{{$locale}}]"
                                                                       placeholder="{{ucwords($locale)}} Car Body Type" value="{{$car->translate($locale)->body_type}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="fuel-type-{{$locale}}">Car Fuel Type</label>
                                                                <input type="text" id="fuel-type-{{$locale}}"
                                                                       class="form-control"
                                                                       name="fuel_type[{{$locale}}]"
                                                                       placeholder="{{ucwords($locale)}} Car Fuel Type" value="{{$car->translate($locale)->fuel_type}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="additional-information-{{$locale}}">Car Additional Information</label>
                                                                <textarea class="form-control"
                                                                          id="additional-information-{{$locale}}"
                                                                          name="additional_information[{{$locale}}]"
                                                                          placeholder="{{ucwords($locale)}} Car Additional Information"
                                                                          rows="3">{{$car->translate($locale)->additional_information}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="divider">
                                    <div class="divider-text">Car Images</div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Multiple Files</h5>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <!-- File uploader with multiple files upload -->
                                                <input type="file" name="car_gallery[]" class="multiple-files-filepond" multiple>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" >
                                    @foreach($car->gallery as $gallery)
                                    <div class="col d-flex justify-content-center">
                                        <img  class="img-fluid" width="200" src="{{$gallery->image}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                        </div>
                    </form>

                </div>
            </section>

        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendors/choices.js/choices.min.js')}}"></script>
    <script src="{{asset('js/pages/form-element-select.js')}}"></script>

    <!-- filepond validation -->
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
        loadRelatedModels = (e) => {
            let makeId = e.value;
            axios.get('/admin/car-model/car-make/' + makeId).then(response => {
                emptyCarModelOptions();
                let data = response.data.data;
                for (let i = 0; i < data.length; i++) {
                    $("#car_model_id").append(new Option(data[i].name, data[i].id));
                }
            })
        }

        emptyCarModelOptions = () => {
            let el = $("#car_model_id");
            el.empty();
            el.append(new Option("-- Choose Car Model --"));
        }

        alertToChoose = () => {
            let el = $("#car_make_id");
            if (isNaN(el.val())) {
                alert('Please Choose a Car Make First')
            }
        }
        // register desired plugins...
        FilePond.registerPlugin(
            // validates the size of the file...
            FilePondPluginFileValidateSize,
            // validates the file type...
            FilePondPluginFileValidateType,
            // preview the image file type...
            FilePondPluginImagePreview,

        );

        // Filepond: Multiple Files
        FilePond.create(document.querySelector('.multiple-files-filepond'), {
            allowImagePreview: true,
            allowMultiple: true,
            allowFileEncode: false,
            required: false,
            storeAsFile: true,
            acceptedFileTypes: ['image/*'],

        });

    </script>
@endsection
