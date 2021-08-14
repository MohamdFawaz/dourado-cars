@extends('front.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('vendors/jquery-nice-select-1.1.0/css/nice-select.css')}}">
@endsection
@section('content')
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('front.layouts.header')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01"
                 style="background-image: url({{asset('images/front/slider-image-1-1600x800.jpg')}});">
                <div class="text-content">
                    <h4>Find your car today!</h4>
                    <h2>Lorem ipsum dolor sit amet</h2>
                </div>
            </div>
            <div class="banner-item-02"
                 style="background-image: url({{asset('images/front/slider-image-2-1920x600.jpg')}});">
                <div class="text-content">
                    <h4>Fugiat Aspernatur</h4>
                    <h2>Laboriosam reprehenderit ducimus</h2>
                </div>
            </div>
            <div class="banner-item-03"
                 style="background-image: url({{asset('images/front/slider-image-3-1920x600.jpg')}});">
                <div class="text-content">
                    <h4>Saepe Omnis</h4>
                    <h2>Quaerat suscipit unde minus dicta</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <form>
                    <div class="search-block clearfix box top white-bg" data-empty-lbl="--Select--">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row sort-filters-box">
                                <div class="col-4">
                                    <span>Car Make</span>
                                    <div class="selected-box">
                                        <select name="car_make_id" class="selectpicker wide"
                                                onchange="loadRelatedModels(this)">
                                            <option value="">-- Select --</option>
                                            @foreach($carMakes as $carMake)
                                                <option value="{{$carMake->id}}">{{$carMake->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <span>Car Model</span>
                                    <div class="selected-box">
                                        <select name="car_model_id" class="selectpicker wide" id="car_model_id">
                                            <option value="">-- Select --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 m-auto">
                                    <div class="selected-box">
                                        <button class="filled-button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="filter-loader"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->


    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Most Popular</h2>
                        <a href="javascript:void(0)">view more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach($featuredCars as $car)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-item">
                            <a href="javascript:void(0)">
                                <img src="{{$car->image}}" alt="">
                                <div class="price">{{$car->price}} {{trans('web.currency_name')}}</div>
                            </a>
                            <div class="down-content">
                                <div class="car-subtitle heading-font">
                                    <div class="car-name">{{$car->name}}</div>
                                </div>
                                <a href="javascript:void(0)"><h4>{{$car->title}}</h4></a>

                                <p>{{$car->hours_power}} &nbsp;/&nbsp; {{ucwords($car->fuel_type)}} &nbsp;/&nbsp; {{ucwords($car->color)}}
                                    &nbsp;/&nbsp;{{$car->number_of_cylinders}}</p>

                                <small class="row">
                                    <strong class="col-4"><i class="fa fa-dashboard"></i> {{$car->kilometers}} km</strong>
                                    <strong class="col-4"><i class="fa fa-cog"></i> {{ucwords($car->transmission_type)}}</strong>
                                    <strong class="col-4"><i class="fa fa-calendar"></i> {{$car->year}}</strong>
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About Us</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <p>Lorem ipsum dolor sit amet, <a href="javascript:void(0)">consectetur</a> adipisicing elit.
                            Explicabo, esse consequatur alias repellat in excepturi inventore ad <a
                                href="javascript:void(0)">asperiores</a> tempora ipsa. Accusantium tenetur voluptate
                            labore aperiam molestiae rerum excepturi minus in pariatur praesentium, corporis, aliquid
                            dicta.</p>
                        <ul class="featured-list">
                            <li><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></li>
                            <li><a href="javascript:void(0)">Consectetur an adipisicing elit</a></li>
                            <li><a href="javascript:void(0)">It aquecorporis nulla aspernatur</a></li>
                            <li><a href="javascript:void(0)">Corporis, omnis doloremque</a></li>
                        </ul>
                        <a href="javascript:void(0)" class="filled-button">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/about-1-570x350.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services"
         style="background-image: url({{asset('images/front/Exotic-Car-Rental-Membership-Services.png')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest car makes</h2>

                        <a href="javascript:void(0)">see all <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>

                @foreach($carMakes->take(3) as $carMake)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <a href="javascript:void(0)" class="services-item-image"><img src="{{$carMake->image}}"
                                                                                          class="img-fluid" alt=""></a>
                            <div class="down-content">
                                <h4><a href="javascript:void(0)">{{$carMake->name}}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="happy-clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Happy Clients</h2>

                        <a href="javascript:void(0)">read more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="owl-clients owl-carousel text-center">
                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>John Doe</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Jane Smith</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Antony Davis</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>John Doe</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Jane Smith</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>

                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="down-content">
                                <h4>Antony Davis</h4>
                                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque,
                                        corporis nulla at quia quaerat."</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                    author nulla.</p>
                            </div>
                            <div class="col-lg-4 col-md-6 text-right">
                                <a href="javascript:void(0)" class="filled-button">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
            el.append(new Option("-- Select --"));
        }
    </script>
@endsection
