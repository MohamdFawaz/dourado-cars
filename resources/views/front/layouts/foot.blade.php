<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendors/jquery-ui-1.12.1/jquery-ui.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=61333a08495f05001236fe42&product=inline-share-buttons"
        async="async"></script>

<script>
    let translations = {
        added_to_compare: "@lang('web.page.car_details.added_to_compare')",
        compare: "@lang('web.car_details.compare')",
    }
</script>
<!-- Additional Scripts -->
<script src="{{asset('js/custom.js?v=1.8')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script>
    window.default_locale = `{{ config('app.locale') }}`;
    window.fallback_locale = `{{ config('app.fallback_locale') }}`;
    window.messages = @if(isset($messages)) @json($messages) @else @json([]) @endif;
</script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@yield('js')
<script>
    $(function () {
        $('#visitForm').on('submit', function (e) {
            e.preventDefault();
            let data = $('#visitForm').serialize();
            axios.post(`{{route('get-in-touch')}}`, data).then(response => {
                setMessage(response.data.message, 'success');
                $('#visitForm')[0].reset();
            }, error => {
                setMessage(error.response.data.message, 'error');
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
        minDate: new Date(),
        maxDate: 'today',
        format: "mm-yyyy",
        viewMode: "months",
        minViewMode: "months"
    });
</script>
</body>
</html>
