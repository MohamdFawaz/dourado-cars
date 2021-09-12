<div class="container">
    <div class="row">
        <form action="{{route('list-cars')}}">
            <div class="search-block clearfix box top white-bg" data-empty-lbl="--Select--">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row sort-filters-box">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span>{{trans('web.home.filter.car_make.label')}}</span>
                            <div class="selected-box">
                                <select name="car_make_id" class="selectpicker wide"
                                        onchange="loadRelatedModels(this); loadRelatedMakeYears(this);">
                                    <option value="">-- {{trans('web.home.filter.car_make.select')}} --</option>
                                    @foreach($carMakes as $carMake)
                                        <option value="{{$carMake->id}}">{{$carMake->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span>{{trans('web.home.filter.car_model.label')}}</span>
                            <div class="selected-box">
                                <select name="car_model_id" class="selectpicker wide" id="car_model_id" onchange="loadRelatedModelYears(this);">
                                    <option value="">-- {{trans('web.home.filter.car_model.select')}} --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <span>{{trans('web.home.filter.year.label')}}</span>
                            <div class="selected-box">
                                <select name="year" class="selectpicker wide" id="year">
                                    <option value="">-- {{trans('web.home.filter.year.select')}} --</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4 m-auto">
                            <div class="selected-box">
                                <button class="filled-button">{{trans('web.home.filter.search_button')}}</button>
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
