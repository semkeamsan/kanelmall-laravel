<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" device="{{ config('page.device') }}">

<head>
    <!-- Favicon -->
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/@fontawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    {{-- <script src="https://themes.3rdwavemedia.com/demo/bs5/orbit/assets/fontawesome/js/all.min.js"></script> --}}
    @stack('styles-link')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
    @stack('styles')
    <script>
        window.languages = {!! collect(Lang::get('*')) !!};
    </script>
</head>

<body
    class="{{ config('page.device') == 'mobile' ? 'g-sidenav-hidden' : (@$_COOKIE['sidenav-state'] == 'unpinned' ? 'g-sidenav-hidden' : 'g-sidenav-show g-sidenav-pinned') }}">
    <div id="app">
        @include('admin.navbar.left')
        <!-- Main content -->
        <div class="main-content" id="panel">
            <!-- Topnav -->
            @include('admin.navbar.top')
            <!-- Header -->
            @include('admin.navbar.header')
            <!-- Page content -->
            <div class="container-fluid mt--6">
                @yield('content')
                <!-- Footer -->
                @include('admin.navbar.footer')
            </div>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    @stack('scripts-src')
    <!-- Argon JS -->
    <script src="{{ asset('js/admin.js') }}"></script>
    {{-- Custom Scripts --}}
    <script src="{{ asset('js/custom.min.js') }}"></script>
    @stack('scripts')
    @if (session('message'))
        <script>
            $.notify({
                icon: 'fal fa-check-circle',
                message: "{!! session('message') !!}",
                url: ""
            }, {
                element: "body",
                type: 'success',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                offset: {
                    x: 15,
                    y: 15
                },
                delay: 2500,
                url_target: "_blank",
                template: '<div data-notify="container" class="alert alert-dismissible alert-{0} alert-notify w-auto" role="alert"><span class="alert-icon" data-notify="icon"></span> <div class="alert-text"</div> <span class="alert-title" data-notify="title">{1}</span> <span data-notify="message">{2}</span></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
            });
        </script>
    @endif

    @if ($errors->all())
        @foreach ($errors->getMessages() as $k => $error)
            <script>
                var tab = $(`[name="{!! $k !!}"]`).parents(`.tab-pane`).attr('id');
                $(`[href="#${tab}"]`).click();
                $.notify({
                    icon: 'fal fa-times',
                    message: "{!! $error[0] !!}",
                    url: ""
                }, {
                    element: "body",
                    type: 'danger',
                    placement: {
                        from: 'top',
                        align: 'right'
                    },
                    offset: {
                        x: 15,
                        y: 15
                    },
                    delay: 2500,
                    url_target: "_blank",
                    template: '<div data-notify="container" class="alert alert-dismissible alert-{0} alert-notify w-auto" role="alert"><span class="alert-icon" data-notify="icon"></span> <div class="alert-text"</div> <span class="alert-title" data-notify="title">{1}</span> <span data-notify="message">{2}</span></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                });
            </script>
        @endforeach
    @endif

    @if (request('tabactive'))
        @push('scripts')
            <script>
                $(`{{ request('tabactive') }}`).click();
            </script>
        @endpush
    @endif
</body>

</html>
