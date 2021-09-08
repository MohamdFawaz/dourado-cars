

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=61333a08495f05001236fe42&product=inline-share-buttons" async="async"></script>

<!-- Additional Scripts -->
<script src="{{asset('js/custom.js?v=1.2')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
<script>
    window.default_locale = `{{ config('app.locale') }}`;
    window.fallback_locale = `{{ config('app.fallback_locale') }}`;
    window.messages = @if(isset($messages)) `@json($messages)` @endif;
</script>
<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>
