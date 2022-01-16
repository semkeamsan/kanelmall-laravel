@extends('layouts.front')

@push('styles')
    <style>
        .video .play {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .aui-banner-content {
            height: 420px;
        }

    </style>
@endpush
@section('meta')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">
    <meta name="description" content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">
    <meta property="og:description" content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">
    <meta property="og:image" content="{{ $product->image_url }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">
    <meta property="twitter:description" content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">
    <meta property="twitter:image" content="{{ $product->image_url }}">
@endsection
@section('content')

    <header class="aui-header-default aui-header-fixed ">
        <a href="#back"  onclick="history.back()" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
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
                                <span class="px-2">{{ $currency->code }} - ( {{ $currency->symbol }} )</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="actionsheet-action" id="cancel"></a>
        </div>
    </div>
    <div class="aui-banner-content aui-fixed-top pt-0">
        <div class="owl-carousel owl-theme">
            <div class="aui-banner-wrapper-item">

                <div class="aui-banner-content aui-fixed-top">
                    <div class="owl-carousel owl-theme">
                        @if (count($product->galleries))
                            @foreach ($product->galleries as $gallery)
                                <div class="aui-banner-wrapper-item">
                                    @switch( $gallery->type)
                                        @case('image')
                                            <a href="{{ $gallery->path }}">
                                                <img data-src="{{ $gallery->path }}"
                                                    src="{{ asset('images/bg/log.jpg') }}">
                                            </a>
                                        @break
                                        @case('video')
                                            <div class="video position-relative">
                                                <a href="{{ $gallery->path }}" class="play" data-toggle="play">
                                                    <i class="fa fa-4x fa-play-circle text-white"></i>
                                                </a>
                                                <video muted src="{{ $gallery->path }}"></video>
                                                <div class="bottom-2 position-absolute right-2" data-toggle="muted">
                                                    <i class="fa fa-2x fa-volume-mute text-white"></i>
                                                </div>
                                            </div>
                                        @break
                                        @default
                                    @endswitch
                                </div>
                            @endforeach
                        @else
                            <div class="aui-banner-wrapper-item">
                                <a href="{{ $product->image_url }}">
                                    <img data-src="{{ $product->image_url }}" src="{{ asset('images/bg/log.jpg') }}">
                                </a>
                            </div>
                        @endif

                    </div>
                    <div class="aui-banner-pagination"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="aui-product-content border-top">
        @if (count($product->prices) > 1)
            <div class="aui-me-content-item-text p-2 bg text-center">
                @foreach ($product->prices as $value)
                    <a href="#">
                        <span class="text-white">
                            {{ currency($value->price, 'USD', session('currency')) }}</span>
                        <span class="text-white">{{ $value->name }}</span>
                    </a>
                @endforeach

            </div>
        @endif

        <div class="aui-real-price clearfix">
            <span>
                {{ currency($product->selling_price, 'USD', session('currency')) }}
            </span>
            @if ($product->promotion)
                <del><span class="aui-font-num">
                        {{ currency($product->price, 'USD', session('currency')) }}</span></del>
            @endif
            <div class="aui-settle-choice">
                <span>{{ __('Sale Price') }}</span>
            </div>
        </div>
        <div class="aui-product-title">
            <h2>
                {{ $product->name }}
            </h2>
            <p>
                {!! $product->description !!}
            </p>
        </div>


        <div class="aui-product">
            <a href="#" class="aui-address-cell  aui-fl-arrow-clear"
                data-ydui-actionsheet="{target:'#actionSheet',closeElement:'#cancel'}">
                <div class="aui-address-cell-ft">
                    {{ __('In Stock') }} :
                    @if ($product->enable_stock && $product->instock)
                        <i class="fa fa-check text-green" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-times text-danger" aria-hidden="true"></i>
                    @endif

                </div>

            </a>

            <a href="#" class="aui-address-cell aui-fl-arrow-clear">
                <div class="aui-address-cell-ft">
                    {{ __('SKU') }} :
                    {{ $product->sku }}</div>
            </a>

            <a href="#" class="aui-address-cell aui-fl-arrow-clear">
                <div class="aui-address-cell-ft">
                    {{ __('Type') }} :
                    {{ $product->type }}</div>
            </a>
            <a href="#" class="aui-address-cell aui-fl-arrow-clear">
                <div class="aui-address-cell-ft">
                    {{ __('Tax Type') }} :
                    {{ $product->tax_type }}
                </div>
            </a>
            <a href="{{ route('front.categoryby', $product->category->id) }}" class="aui-address-cell aui-fl-arrow-clear">
                <div class="aui-address-cell-ft">
                    {{ __('Category') }} :
                    {{ $product->category->name }}
                </div>
            </a>

        </div>

        <div class="aui-dri"></div>

    </div>
    @if ($product->enable_stock && $product->instock)
        <footer class="aui-footer-product">
            <div class="aui-footer-product-fixed">
                <div class="aui-footer-product-action-list float-right">
                    <a href="{{ route('front.cartadd', $product->id) }}" data-toggle="add-cart"
                        class="yellow-color {{ !Cart::exists($product->id) ?: 'd-none' }}">
                        {{ __('Add Cart') }}
                    </a>
                    <a href="{{ route('front.account.orderadd', $product->id) }}"
                        class="red-color {{ !Cart::exists($product->id) ?: 'w-100' }}">{{ __('Buy Now') }}</a>
                </div>
            </div>
        </footer>
    @endif
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>

    <script>
        $(document).ready(() => {
            var media = {!! json_encode($product->galleries) !!};
            var items = media.map(function(item) {
                if (item.type == 'video') {
                    return {
                        src: `<video class="w-100" controls autoplay src="${item.path}"></video>`,
                        type: 'inline',
                        midClick: true
                    };
                }
                return {
                    src: item.path,
                    type: 'image'
                };
            });

            $(document).ready(() => {
                $('.owl-carousel').magnificPopup({
                    index: parseInt($(this).attr('data-index'), 10),
                    items: items,
                    gallery: {
                        enabled: true
                    },
                });
            });


        });
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: false,
            video: true,
            lazyLoad: true
        });
        // $('video').click(function() {
        //     var video = this;
        //     if (video.paused) {
        //         $(this).parents('.video').find(`[data-toggle="play"]`).click();
        //     } else {
        //         video.pause();
        //         $(this).parents('.video').find(`[data-toggle="play"]`).removeClass('d-none');
        //     }
        // });
        $(`[data-toggle="play"]`).click(function(e) {
            e.preventDefault();
            var video = $(this).parents('.video').find('video').get(0);
            video.play();
            $(this).addClass('d-none');
        });
    </script>
@endpush
