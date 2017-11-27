<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}} | Crypto Trading Matrix</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="world coin" />

    <link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/admin/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/admin/custom.css')}}">
    <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <script>$(document).ready(function () {
            $('[data-toggle = "tooltip"]').tooltip();
        })</script>

    <script>
        $('#toggle-btn').on('click', function (e) {
            e.preventDefault();
            $(this).toggleClass('active');

            $('.side-navbar').toggleClass('shrinked');
            $('.content-inner').toggleClass('active');

            if ($(window).outerWidth() > 1183) {
                if ($('#toggle-btn').hasClass('active')) {
                    $('.navbar-header .brand-small').hide();
                    $('.navbar-header .brand-big').show();
                } else {
                    $('.navbar-header .brand-small').show();
                    $('.navbar-header .brand-big').hide();
                }
            }

            if ($(window).outerWidth() < 1183) {
                $('.navbar-header .brand-small').show();
            }
        });
    </script>
</head>
<body style="background-color: white!important; font-family: 'Andale Mono'!important;">
    <div class="page charts-page" style="background-color: white!important;">
        @include('Partials._adminNavbar')
        <div class="page-content d-flex align-items-stretch" style="background-color: white!important;">
            @include('Partials._adminSideBar')
            @yield('body')
        </div>
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>



