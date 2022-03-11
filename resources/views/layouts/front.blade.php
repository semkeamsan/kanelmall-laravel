<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('icons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('icons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('icons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('icons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('icons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('icons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('icons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('icons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('icons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('icons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#ff531f">
    <meta name="msapplication-TileImage" content="{{ asset('icons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ff531f">
    <link rel="search" type="application/opensearchdescription+xml" title="Kanel Mall"
        href="{{ asset('browserconfig.xml') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/@fontawesome/fontawesome-free/css/all.min.css') }}"
        type="text/css">
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}">
    <link rel='stylesheet' href="{{ asset('vendor/owl.carousel/owl.carousel.min.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    @livewireStyles
    <style id="root">
        :root {
            --app-width: {{ config('page.device') == 'web' ? '500px' : '100%' }};
        }

    </style>
    <style>
        .app-width {
            width: calc(var(--app-width));
        }

        .owl-theme,
        .owl-stage-outer,
        .owl-stage,
        .owl-item,
        .video {
            height: 100%;
        }

        .swal2-popup.swal2-toast {
            width: 260px;
        }

        #app {
            margin: auto;
            position: relative;
            width: calc(var(--app-width));
            top: 0;
            bottom: 0;
        }

        .text-ssm {
            font-size: 12px;
        }

    </style>
    @stack('styles')
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
        window.languages = {!! collect(Lang::get('*')) !!};
    </script>
    <style>
        html {
            touch-action: manipulation;
        }

        .svg-loader {
            display: flex;
            width: 100%;
            padding: 20px;
            align-content: space-around;
            justify-content: center;
        }

        .loader-svg {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            fill: none;
            stroke-width: 5px;
            stroke-linecap: round;
            stroke: var(--primary);
        }

        .loader-svg.bg {
            stroke-width: 8px;
            stroke: #fff;
        }

        .animate {
            stroke-dasharray: 242.6;
            animation: fill-animation 1s cubic-bezier(1, 1, 1, 1) 0s infinite;
        }

        @keyframes fill-animation {
            0% {
                stroke-dasharray: 40 242.6;
                stroke-dashoffset: 282.6;
            }

            50% {
                stroke-dasharray: 141.3;
                stroke-dashoffset: 141.3;
            }

            100% {
                stroke-dasharray: 40 242.6;
                stroke-dashoffset: 0;
            }
        }

    </style>

</head>

<body>
    <div id="app" class="h-100 {{ config('page.device') == 'web'? 'border':null }}">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/aui.js') }}"></script>
    <script src="{{ asset('vendor/jquery.lazy/jquery.lazy.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.lazy/jquery.lazy.plugins.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('vendor/masonry-layout/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    @if (app()->getLocale() != 'en')
        <script src="{{ asset('vendor/sweetalert2/dist/locales/' . app()->getLocale() . '.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap-datepicker/dist/locales/' . app()->getLocale() . '.js') }}"></script>
    @endif
    <script src="{{ asset('js/custom.js') }}"></script>
    @livewireScripts
    <script>
        const ajaxroutes = {
            home: `{{ route('ajax.front.home') }}`,
        };
        $(document).ready(() => {
            $i = 0;
            var ajax = () => {
                $.get(`{{ route('init') }}`).done(() => {
                    window.init = true;
                }).fail((error) => {
                    //console.error(error.statusText);
                    if ($i < 10) {
                        ajax();
                    }
                    $i++;
                });
            }
            ajax();
            Livewire.hook('message.processed', (message, component) => {
                Kanel.select2(false);
                Kanel.select2Image(false);
                Kanel.datepicker();
            });
            window.livewire.on('urlChange', param => {
                history.pushState(null, null, param);
            });
        });


    </script>
    @stack('scripts')
</body>

</html>
