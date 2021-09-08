@extends('front.layouts.app')

@section('title')
    <title>{{trans('web.title.sell_a_car')}} | {{trans('web.title.site_name')}}</title>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="page-heading about-heading header-text"
         style="background-image: url({{asset('images/about-us.jpeg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h4>{{trans('web.pages.sell_a_car.upper_title')}}</h4>
                        <h2>{{trans('web.pages.sell_a_car.lower_title')}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="app">
        <div class="row">
            <div class="container">
                <stepper-form></stepper-form>
            </div>
        </div>
    </div>

    <div class="team-members">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>{{trans('web.page.sell_a_car.section_1_heading')}}</h2>
                    </div>
                    <p class="text-center">{{trans('web.page.sell_a_car.section_1_content')}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import StepperForm from "../../../../public/js/components/StepperForm";

    export default {
        components: {StepperForm}
    }
</script>
