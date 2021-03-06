<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('images/fav-icon.png?v=1.0')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    @yield('title')

    <!-- Bootstrap core CSS -->
    @if(app()->getLocale() == 'ar')
        <link href="{{asset('css/bootstrap.rtl.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="{{asset('vendors/jquery-ui-1.12.1/jquery-ui.css')}}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('css/style.rtl.min.css?v=1.9')}}">
    @else
        <link rel="stylesheet" href="{{asset('css/style.min.css?v=1.31')}}">
    @endif

    <link rel="stylesheet" href="{{asset('css/owl.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('css')
</head>
<body>
