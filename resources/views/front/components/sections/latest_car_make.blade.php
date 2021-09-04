<div class="latest-car-make"
     style="background-image: url({{asset('images/front/Exotic-Car-Rental-Membership-Services.jpeg')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>{{trans('web.home.latest_car_make.title')}}</h2>

                    <a href="javascript:void(0)">{{trans('web.home.latest_car_make.see_all')}}<i class="fa fa-angle-right"></i></a>
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
