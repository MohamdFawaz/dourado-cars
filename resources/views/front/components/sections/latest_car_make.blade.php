<div class="latest-car-make"
     style="background-image: url({{asset('images/front/Exotic-Car-Rental-Membership-Services.jpeg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>{{trans('web.home.latest_car_make.title')}}</h2>
                </div>
            </div>
            <div class="car-makes-slider owl-carousel">
                @foreach($carMakes as $carMake)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item">
                            <a href="{{route('list-cars',['car_make_id' => $carMake->id])}}"
                               class="services-item-image">
                                <img src="{{$carMake->image}}" class="img-fluid" alt="">
                            </a>
                            <div class="down-content">
                                <h4>
                                    <a href="{{route('list-cars',['car_make_id' => $carMake->id])}}">{{$carMake->name}}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
