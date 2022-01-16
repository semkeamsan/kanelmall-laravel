@extends('layouts.front')
@push('styles')
    <style>
        .aui-list-product-item {
            width: 33.333%;
        }

        .aui-list-product-item-img {
            /* min-width: 120px;
                min-height: 120px; */
        }

        .aui-list-product-item-img img,
        .aui-list-product-item-img video {

            object-fit: contain;
        }

    </style>
@endpush
@section('meta')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ env('APP_NAME') }} — {{ $category->name }}">
    <meta name="description" content="{{ env('APP_NAME') }} — {{ $category->name }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ env('APP_NAME') }} — {{ $category->name }}">
    <meta property="og:description" content="{{ env('APP_NAME') }} — {{ $category->name }}">
    <meta property="og:image" content="{{ $category->image_url }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ env('APP_NAME') }} — {{ $category->name }}">
    <meta property="twitter:description" content="{{ env('APP_NAME') }} — {{ $category->name }}">
    <meta property="twitter:image" content="{{ $category->image_url }}">
@endsection
@section('content')
    <header class="aui-header-default aui-header-fixed ">
        <a href="#back"  onclick="history.back()" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <form action="{{ route('front.categoryby', $category->id) }}" class="aui-header-search-box">
                <i class="aui-icon aui-icon-small-search"></i>
                <input name="q" type="text" placeholder="{{ __('Search') }}" class="aui-header-search"
                    value="{{ request('q') }}">
            </form>
        </div>
        <a href="#" class="aui-header-item-icon position-absolute right-0"
            data-ydui-actionsheet="{target:'#action-languages',closeElement:'#cancel'}">
            <img width="26" src="{{ asset('images/flags/' . app()->getLocale() . '.svg') }}" />
        </a>
    </header>
    <div class="m-actionsheet" id="action-languages">
        <div style="position:relative">
            <div class="p-3 border-bottom text-left">
                <h4>{{ __('Languages') }}</h4>
            </div>
            <div class="aui-product-text-content h-100">
                @foreach (config('laravellocalization.supportedLocales', []) as $key => $lang)
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <a class="border-0 d-flex {{ $key == app()->getLocale() ? 'active' : null }}"
                                href="{{ LaravelLocalization::getLocalizedURL($key) }}">
                                <span>
                                    <img width="26" src="{{ asset('images/flags/' . $key . '.svg') }}" />
                                </span>
                                <span class="px-2">{{ $lang['native'] }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="p-3 border-bottom text-left">
                <h4>{{ __('Currency') }}</h4>
            </div>
            <div class="aui-product-text-content h-100">
                @foreach (DB::table('currencies')->get() as $currency)
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <a class="border-0 d-flex {{ $currency->code == session('currency') ? 'active' : null }}"
                                href="{{ route('currency.set', $currency->code) }}">
                                <span class="px-2">{{ $currency->code }} - ( {{ $currency->symbol }}
                                    )</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="actionsheet-action" id="cancel"></a>
        </div>
    </div>
    <div class="aui-banner-content">
        <div class="owl-carousel owl-theme">
            @if ($category->image_url)
                <div class="aui-banner-wrapper-item">
                    <img data-src="{{ $category->image_url }}" src="{{ asset('images/bg/log.png') }}">
                </div>
            @endif
            @if ($category->promotion)
                <div class="aui-banner-wrapper-item">
                    <img data-src="{{ $category->promotion->image_url }}" src="{{ asset('images/bg/log.png') }}">
                </div>
            @endif
        </div>
    </div>
    <div class="aui-well px-3 py-0 {{ $category->promotion ? 'border-bottom' : null }}">
        <div class="aui-well-bd">
            <h4 class="aui-scroll-content-title">{{ $category->name }}</h4>
        </div>
    </div>
    @if ($category->promotion)
        <div class="aui-well px-3 py-0 border-bottom">
            <div class="aui-well-bd">
                <marquee behavior="" direction="right">
                    {{ $category->promotion->name }}
                </marquee>
            </div>
        </div>
    @endif
    <div class="aui-content-box">
        @include('front.categoryby.product')
    </div>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth
@endsection
