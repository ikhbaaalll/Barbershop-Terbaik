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
    <title>{{ config('app.name', 'Donjack Barbershop') }} - {{ $title }} </title>

    <!-- LINK CSS LAMA DIPINDAH KE BAWAH -->
    
    {{-- <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('css/user_style.css') }}">
    
</head>

<body class="hold-transition login-page">

    <!-- CUSTOM PAGE BACKGROUND -->
    @yield('CustomBG')

    <!-- HEADER NAVIGATION BAR -->
    @auth
        <div class="logged-in-header">
            <div class="header-menu">
                <a @if(Route::is('user.home'))class="active-header-menu"@endif href="{{ route('user.home') }}">Home</a>
                <span>  |  </span>
                <a @if(Route::is('user.profile'))class="active-header-menu"@endif href="{{ route('user.profile') }}">Profile</a>
                <span>  |  </span>
                <a @if(Route::is('user.about'))class="active-header-menu"@endif href="{{ route('user.about') }}">About Us</a> 
            </div>
            <div class="web-main-logo">
                <a href="">Donjack <span>Barbershop</span></a>
            </div>
            <div class="header-menu">
                <h4 class="profile-btn">@if(Route::is('user.home'))Welcome, @endif
                    <span>
                        @<a id="Logout" onclick="showLogoutBtn()">{{ auth()->user()->name  }}</a>
                    </span>
                    <div id="LogoutBtn" class="logout">
                        <form action="{{route('logout')}}" method="POST"> 
                            @csrf 
                            <div class="input-group">
                                <button type="submit" class="logout-btn">Log out</button>
                                <i class="icon logout-icon"></i>
                            </div>
                        </form>
                    </div>
                </h4>
            </div>
        </div>
    @else
        <div class="header">
            <div class="web-main-logo">
                <a href="">Donjack <span>Barbershop</span></a>
            </div>
            <div class="header-menu">
                <a href="">About Us</a>
                <span>  |  </span>
                <a href="">Contact Us</a>
            </div>
        </div>
    @endauth
    

    <!-- PAGE CONTENT -->
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/user_script.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script> --}}
</body>
</html>




<!-- LINK CSS LAMA -->

<!-- Google Font: Source Sans Pro -->
{{-- 
        
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}"> 
    
--}}