<div class="visit-showroom" style="margin: 0; padding: 0">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="get-in-touch-box">
                    <h4 class="aos-init aos-animate">{{trans('web.footer.visit_our_showroom.get_in_touch_title')}} <br> {{$car->name}}</h4>
                    <div class="showroom_msg text-white mb-2 p-2 hidden"></div>
                    <form id="visitForm" method="post">
                        <div>
                            <div class="form-group">
                                <input maxlength="30" class="form-control" name="full_name" id="full_name" type="text"
                                       placeholder="{{trans('web.footer.visit_our_showroom.form.full_name_placeholder')}}"
                                       autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" maxlength="15"
                                       name="mobile_number"
                                       id="mobile_number" type="text"
                                       placeholder="{{trans('web.footer.visit_our_showroom.form.mobile_number_placeholder')}}"
                                       autocomplete="off" required onkeypress="validateMobileNumber(event)">
                            </div>
                            <div class="form-group">
                                <input name="date" id="date"
                                       class="form-control datepickers prefferedDate hasDatepicker" type="date"
                                       placeholder="{{trans('web.footer.visit_our_showroom.form.preferred_date_placeholder')}}"
                                       autocomplete="off" required min="{{now()->toDateString()}}" max="{{now()->addMonth()->toDateString()}}">
                            </div>
                            <div class="form-group">
                                <input name="time" id="time"
                                       class="form-control datepickers prefferedTime hasDatepicker" type="time"
                                       placeholder="{{trans('web.footer.visit_our_showroom.form.preferred_time_placeholder')}}"
                                       autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input maxlength="30" class="form-control" name="car_name" id="car_name" type="text"
                                       value="{{$car->name . " - " . $car->title}}" autocomplete="off" readonly>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary col-12">
                                    {{trans('web.footer.visit_our_showroom.form.preferred_time_placeholder')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendors/jquery-ui-1.12.1/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script>
    $(function () {
        $('#visitForm').on('submit', function (e) {
            e.preventDefault();
            let data = $('#visitForm').serialize();
            axios.post(`{{route('get-in-touch')}}`, data).then(response => {
                setMessage(response.data.message, 'success');
                $('#visitForm')[0].reset();
                window.location = '/' + "?status=success";
            }, error => {
                setMessage(error.response.data.message, 'error');
                window.location = '/' + "?status=fail";
            });
        });
        setMessage = (message, type) => {
            $('html,body').animate({scrollTop: $(".visit-showroom").offset().top}, 'slow');
            let $message = $('.showroom_msg');
            $message.removeClass('bg-success');
            $message.removeClass('bg-danger');
            if (type === 'success') {
                $message.text(message);
                $message.addClass('bg-success');
            } else {
                $message.text(message);
                $message.addClass('bg-danger');
            }
            $message.removeClass('hidden');
        }

    });
    setMessage = (message, type) => {
        let $message = $('.showroom_msg');
        $message.removeClass('bg-success');
        $message.removeClass('bg-danger');
        if ('success') {
            $message.text(message);
            $message.addClass('bg-success');
        } else {
            $message.text(message);
            $message.addClass('bg-danger');
        }
        $message.removeClass('hidden');
    }
    function validateMobileNumber(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }

    $(".datepickers").datepicker({
        minDate: 0,
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });
</script>
