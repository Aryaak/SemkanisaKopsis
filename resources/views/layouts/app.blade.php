<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Semkanisa Kopsis Dashboard') }}</title>
        <!-- Favicon -->
        <link class="img-rounded" href="{{ asset('img/brand/SemkanisaKopsis-Logo-01.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <!-- preloader -->
        <link rel="stylesheet" href="{{asset('css/preloader.css')}}">
        <!-- DataTable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/r-2.2.9/datatables.min.css"/>
    </head>
    <body id="stop-scrolling" class="{{ $class ?? '' }}">
        @if (Route::currentRouteName() != 'login')
            <div class="preloader">
                <div class="loading" id="loading">
                    <img class="prelogo" src="{{asset('img/brand/orange.png')}}" alt="">
                    <br>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        @endif
        @auth()
            @if (Route::currentRouteName() != 'welcome')
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
            @endif
        @endauth

        <div class="main-content" id="panel">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon/vendor/jquery/dist/jquery.min.js')}}"></script>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        {{-- <script src="{{ asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- DataTable -->
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.4/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/r-2.2.9/datatables.min.js"></script>


        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('argon/js/argon.js?v=1.0.0')}}"></script>
        <!-- Preloader -->
        <script>
            function preloaderFadeOutInit(){
                $('.preloader').fadeOut(700);
                $('body').attr('id','stop-scrolling');
                }
                // Window load function
                jQuery(window).on('load', function () {
                (function ($) {
                preloaderFadeOutInit();
                })(jQuery);
            });
        </script>
        <script>
            $.extend(true, $.fn.dataTable.defaults.oLanguage.oPaginate, {
                sNext: '<i class="fa fa-chevron-right" ></i>',
                sPrevious: '<i class="fa fa-chevron-left" ></i>'
            });
        </script>
        {{-- <script src="{{asset('js/toRupiah.js')}}"></script> --}}
    </body>
</html>