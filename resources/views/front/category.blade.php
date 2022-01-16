@extends('layouts.front')
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
    <section class="aui-scroll-contents">
        <div class="aui-scroll-box pt-0">
            <div class="aui-scroll-content">
                <div class="aui-grid-row aui-grid-row-clear">
                    @foreach ($categories as $category)
                        @if (count($category->products))
                            <a href="{{ route('front.categoryby', $category->id) }}" class="aui-grid-row-item">
                                <i class="aui-icon-large1">
                                    <img data-src="{{ $category->image_url }}" src="{{ asset('images/bg/log.jpg') }}">
                                </i>
                                <p class="aui-grid-row-label text-truncate">{{ $category->name }}</p>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth

@endsection
