<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <!-- Libs CSS -->
    <link href="{{ asset('dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/selectize/dist/css/selectize.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/fullcalendar/core/main.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/fullcalendar/daygrid/main.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/fullcalendar/timegrid/main.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/fullcalendar/list/main.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/flatpickr/dist/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/libs/nouislider/distribute/nouislider.min.css') }}" rel="stylesheet" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v1.8.0/mapbox-gl.css" rel="stylesheet" />
    <!-- Tabler Core -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <!-- Tabler Plugins -->
    <link href="{{ asset('dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/css/tabler-buttons.min.css') }}" rel="stylesheet" />

    <!-- Libs JS -->
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/libs/jquery/dist/jquery.slim.min.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>

    <!-- SEO -->
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <div class="content">
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="card card-lg">
                        <div class="card-body">
                            <div class="alert alert-warning">
                                Hi there! Thank you for using the <code><a href="https://github.com/Proxeuse/fortify-tabler">Proxeuse/fortify-tabler</a></code> FortifyUI preset.
                                We've automatically generated all authentication pages (e.g. login, register, password-reset) but you should manually
                                configure all other pages. You can change this message by editing <code style="color:inherit">/resources/views/layouts/dashboard.blade.php</code><br>
                                <small> - © Tabler.io CSS framework. Powered by Proxeuse.</small>
                            </div>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
