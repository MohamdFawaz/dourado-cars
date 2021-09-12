<div class="latest-cars">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>{{trans('web.home.most_popular_title')}}</h2>
                    <a class="d-none d-sm-none d-lg-block d-md-block" href="{{route('list-cars')}}">{{trans('web.home.view_more_title')}}<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            @foreach($featuredCars as $car)
                <div class="col-lg-4 col-md-6">
                    {{ view('front.components.car_item',compact('car')) }}
                </div>
            @endforeach
        </div>
    </div>
</div>
