<div class="price">{{$car->price}} {{trans('web.currency_name')}}</div>
<div class="product-item">
    <a href="{{route('show-car',$car->id)}}" class="car-anchor">
        <img src="{{$car->image}}" alt="" class="car-image">
    </a>
    <div class="down-content">
        <div class="car-subtitle heading-font">
            <div class="car-name">{{$car->name}}</div>
        </div>
        <a href="{{route('show-car',$car->id)}}"><h4>{{$car->title}}</h4></a>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 car-details-icon-holder text-center">
                <img src="{{asset('speedometer.png')}}" alt="speedometer-icon" class="img-fluid">
                <span>{{$car->kilometers}} {{trans('web.kilometers')}}</span>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 car-details-icon-holder text-center">
                <img src="{{asset('calendar.png')}}" alt="calendar-icon" class="img-fluid">
                <span>{{$car->year}}</span>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 car-details-icon-holder text-center">
                <img src="{{asset('car_engine.png')}}" alt="car-engine-icon" class="img-fluid">
                <span>{{$car->horse_power}}</span>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 social-super-holder text-center">
                <div class="row">
                    <div class="col-6 social-icon-holder">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('show-car',$car->id)}}"
                           target="_blank">
                            <i class="fa fa-facebook-f"></i>
                        </a>
                    </div>
                    <div class="col-6 social-icon-holder">
                        <a href="https://www.instagram.com/?url={{route('show-car', $car->id)}}" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 social-icon-holder">
                        <a href="http://pinterest.com/pin/create/button/?url={{route('show-car',$car->id)}}" target="_blank">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
                    <div class="col-6 social-icon-holder">
                        <a href="whatsapp://send?text={{route('show-car', $car->id)}}"
                           data-action="share/whatsapp/share" target="_blank">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center mb-3">
            <a href="{{route('show-car', $car->id)}}" class="filled-button more-details">More Info</a>
        </div>
    </div>
</div>
