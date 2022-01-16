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
    <livewire:front.cart/>
@endsection
