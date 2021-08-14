<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <title>Dourado Cars</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css?v=1.1')}}">
    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
    @yield('css')
</head>
<body>

@yield('content')

@include('front.layouts.footer')


<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


<!-- Additional Scripts -->
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/owl.js')}}"></script>
@yield('js')
</body>
</html>
