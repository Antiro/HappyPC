<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Fav Icon  -->
    <link rel="icon" href="{{asset('storage/logo/logo4.png')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('addAdmin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">

    <!-- Styles -->
{{--    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">--}}
{{--    услуги карточки--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/vendor.bundle.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/them.css') }}">--}}
    <script src="{{ asset('js/jquery.bundle.js') }}"></script>

    {{--Icons--}}
    <script src="https://kit.fontawesome.com/fadeae1568.js" crossorigin="anonymous"></script>
{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}

</head>
<body>

@yield('content')

{{--<script src="{{ asset('js/vendors/bootstrap.bundle.min.js') }}"></script>--}}
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

@stack('script')

</html>
