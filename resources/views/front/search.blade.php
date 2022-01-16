@extends('layouts.front')
@section('meta')
    <meta name="author" content="Sem keamsan">
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="og:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="og:image" content="{{ asset('images/logo.jpg') }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="article:publisher" content="https://www.facebook.com/semkeamsan" />
    <meta property="article:published_time" content="" />
    <meta property="article:modified_time" content="" />
    <meta property="og:updated_time" content="" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta name="twitter:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta name="twitter:image" content="{{ asset('images/logo.jpg') }}">
    <meta name="twitter:site" content="@semkeamsan">

    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="og:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="article:publisher" content="https://www.facebook.com/semkeamsan" />
    <meta property="article:section" content="Blog" />
    <meta property="og:updated_time" content="" />
    <meta property="og:image" content="{{ asset('images/logo.jpg') }}" />
    <meta property="og:image:secure_url" content="{{ asset('images/logo.jpg') }}" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1280" />
    <meta property="og:image:alt" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta name="twitter:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
    <meta name="twitter:site" content="@semkeamsan" />
    <meta name="twitter:creator" content="@semkeamsan" />
    <meta name="twitter:image" content="{{ asset('images/logo.jpg') }}" />
@endsection
@section('content')
    @include('front.navbar.header')
    <div class="aui-content-box pt-5">
        @if ($products->count())
            @include('front.home.product')
        @else
            <section class="" data-page="">
                <div class="aui-recommend py-3">
                    <h4>{{ __('No results') }} : <small>{{ request('q') }}</small></h4>
                </div>
            </section>
        @endif
    </div>
    @include('front.navbar.footer')
@endsection
