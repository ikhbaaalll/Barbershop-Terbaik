<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- WEBSITE ICON -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/TempDonjack.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('media/icons/TempDonjack.png') }}" sizes="16x16">
    <meta name="application-name" content="LAPOR!">

    <!-- PAGE TITLE -->
    <title>{{ config('app.name', 'Donjack Barbershop') }} </title>

    <!-- LINK CSS LAMA DIPINDAH KE BAWAH -->

    {{-- <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/user_style.css') }}">

</head>

<body class="hold-transition login-page">

    <!-- CUSTOM PAGE BACKGROUND -->
    @yield('CustomBG')

    <!-- HEADER NAVIGATION BAR -->
    <div class="header">
        @yield('HeaderNavBar')
    </div>


    <!-- PAGE CONTENT -->
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
</body>

</html>




<!-- LINK CSS LAMA -->

<!-- Google Font: Source Sans Pro -->
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}"> --}}
