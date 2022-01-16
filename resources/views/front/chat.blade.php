@extends('layouts.front')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .icon {
            padding: 10px;
            font-size: 30px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            color: #fff;
        }

        section a.link {
            vertical-align: 10px;
            font-size: 14px;
        }

    </style>
@endpush
@section('meta')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta name="description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta property="og:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta property="og:image" content="{{ asset('images/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta property="twitter:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
    <meta property="twitter:image" content="{{ asset('images/logo.jpg') }}">
@endsection
@section('content')
    <div class="aui-content-box pt-0">
        <section class="p-1">
            @foreach ($chatmanagers as $chat)
            <div>
                <a href="{{ $chat->link }}">
                    <i class="icon {{ $chat->icon }}" @if( $chat->color) style="background:{{ $chat->color }}" @endif style="color:inherit"></i>
                </a>
                <a class="link" href="{{ $chat->link }}"> {{ $chat->link }} </a>
            </div>
            @endforeach
        </section>
    </div>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth
@endsection

@push('scripts')
    <script src="{{ asset('js/aui-cart.js') }}"></script>
@endpush
