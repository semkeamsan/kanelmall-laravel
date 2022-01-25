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
            /* height: 420px; */
        }

        .mfp-close-btn-in .mfp-close {
            right: -6px;
            text-align: right;
            padding-right: 6px;
            width: 100%;
            color: #fff !important;
        }

    </style>
@endpush
@section('meta')
    <meta name="author" content="Sem keamsan">
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}" />
    <meta property="og:description" content="{{ strip_tags($product->description) }}" />
    <meta property="og:image" content="{{ $product->image_url }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:site_name"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}" />
    <meta property="article:publisher" content="https://www.facebook.com/semkeamsan" />
    <meta property="article:published_time" content="" />
    <meta property="article:modified_time" content="" />
    <meta property="og:updated_time" content="" />

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}">
    <meta name="twitter:description" content="{{ strip_tags($product->description) }}">
    <meta name="twitter:image" content="{{ $product->image_url }}">
    <meta name="twitter:site" content="@semkeamsan">

    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
    <link rel="canonical" href="{{ url()->full() }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}" />
    <meta property="og:description" content="{{ strip_tags($product->description) }}" />
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:site_name"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}" />
    <meta property="article:publisher" content="https://www.facebook.com/semkeamsan" />
    <meta property="article:section" content="Blog" />
    <meta property="og:updated_time" content="" />
    <meta property="og:image" content="{{ $product->image_url }}" />
    <meta property="og:image:secure_url" content="{{ $product->image_url }}" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1280" />
    <meta property="og:image:alt"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title"
        content="{{ env('APP_NAME') }} — {{ currency($product->selling_price, 'USD', session('currency')) }} {{ $product->name }}" />
    <meta name="twitter:description" content="{{ strip_tags($product->description) }}" />
    <meta name="twitter:site" content="@semkeamsan" />
    <meta name="twitter:creator" content="@semkeamsan" />
    <meta name="twitter:image" content="{{ $product->image_url }}" />
@endsection
@section('content')

    <header class="aui-header-default aui-header-fixed ">
        <a href="#back" onclick="history.back()" class="aui-header-item">
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
            @if ($product->description)
                <p style="height: 40px;overflow:hidden" id="text-limit">
                    {!! $product->description !!}
                </p>
                @if (strlen($product->description) > 130)
                    <button class="btn btn-sm" id="read-more">{{ __('Read more') }}</button>
                @endif
            @endif
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

            <a href="#" class="aui-address-cell aui-fl-arrow-clear d-none">
                <div class="aui-address-cell-ft">
                    {{ __('Type') }} :
                    {{ $product->type }}</div>
            </a>
            <a href="#" class="aui-address-cell aui-fl-arrow-clear d-none">
                <div class="aui-address-cell-ft">
                    {{ __('Tax Type') }} :
                    {{ $product->tax_type }}
                </div>
            </a>
            <a href="{{ route('front.categoryby', $product->category->id) }}"
                class="aui-address-cell aui-fl-arrow-clear">
                <div class="aui-address-cell-ft">
                    {{ __('Category') }} :
                    <span class="text-primary">{{ $product->category->name }}</span>
                </div>
            </a>
        </div>
        <div class="aui-dri"></div>
    </div>
    @if ($product->enable_stock && $product->instock)
        <footer class="aui-footer-product">
            <div class="aui-footer-product-fixed">
                <div class="aui-footer-product-action-list float-right">
                    <a href="{{ route('front.cartadd', $product->id) }}"
                        data-ydui-actionsheet="{target:'#action-cart',closeElement:'#cancel'}"
                        class="yellow-color w-100 {{ !Cart::exists($product->id) ?: 'd-none' }}">
                        {{ __('Add Cart') }}
                    </a>
                    {{-- <a href="{{ route('front.account.orderadd', $product->id) }}"
                        class="red-color {{ !Cart::exists($product->id) ?: 'w-100' }}">{{ __('Buy Now') }}</a> --}}
                </div>
            </div>
        </footer>
    @endif
    <div class="m-actionsheet" id="action-cart">
        <div style="position:relative">
            <div class="aui-spec-menu-top">
                <div class="aui-spec-first-pic">
                    <img src="{{ $product->image_url }}">
                </div>
                <div class="aui-spec-first-sif">
                    @if ($product->prices)
                        <h2 class="p-0">
                            {{ currency(max(array_column($product->prices, 'price')), 'USD', session('currency')) }}</h2>
                    @else
                        <h2 class="p-0">{{ currency($product->selling_price, 'USD', session('currency')) }}
                        </h2>
                    @endif

                    <div> {{ __('SKU') }} : {{ $product->sku }}</div>
                    <div> {{ __('Category') }} : <span class="text-primary">{{ $product->category->name }}</span>
                    </div>
                </div>
            </div>
            <div class="aui-product-text-content h-100">
                <div class="aui-product-text-content-list">
                    <div class="aui-product-text-content-list-bd">
                        <span>{{ __('Quantity') }} :</span>
                    </div>
                    <div class="aui-product-text-content-list-ft">
                        <div class="aui-cart-box-list-text-price d-flex">
                            <button onclick="qty('-')" class="btn minus m-0">-</button>
                            <input type="number" class="num border py-1 mx-1 text-center" value="1">
                            <button onclick="qty('+')" class="btn plus">+</button>
                        </div>
                    </div>
                </div>
                <div class="aui-product-text-content-list">
                    <div class="aui-product-text-content-list-bd">
                        <span>{{ __('Total') }} :</span>
                    </div>
                    <div class="aui-product-text-content-list-ft total">
                        @if ($product->prices)
                            <h2>{{ currency(max(array_column($product->prices, 'price')), 'USD', session('currency')) }}
                            </h2>
                        @else
                            <h2>{{ currency($product->selling_price, 'USD', session('currency')) }}</h2>
                        @endif
                    </div>
                </div>

            </div>

            <a href="javascript:;" class="actionsheet-action" id="cancel"></a>
            <div class="aui-product-function">
                <a href="{{ route('front.cartadd', $product->id) }}" class="yellow-color" data-toggle="add-cart">
                    {{ __('Add Cart') }}</a>
                <a href="{{ route('front.account.orderadd', $product->id) }}"
                    class="red-color">{{ __('Buy Now') }}</a>
            </div>

        </div>
    </div>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify />
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

            if (media.length == 0) {
                media = [{
                    path: `{{ $product->image_url }}`,
                    type: 'image',
                }];
            }
            var items = media.map(function(item) {
                if (item.type == 'video') {
                    return {
                        src: `<div class="mfp-figure"><figure><video class="w-100" controls autoplay src="${item.path}" style="padding:40px 0 40px"></video><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>`,
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
            //video.play();
            // $(this).addClass('d-none');
        });
        $(`#read-more`).click(function() {

            if ($(`#text-limit`).hasClass('read')) {
                $(this).text(`{{ __('Read more') }}`);
                $(`#text-limit`).removeClass('read').css({
                    height: 40,
                });
            } else {
                $(this).text(`{{ __('Hide description') }}`);
                $(`#text-limit`).addClass('read').css({
                    height: 'auto',
                });
            }
        });

        function qty(sign) {
            var a = $(`.num`).val();
            var b = eval(a + sign + 1);
            if (b == 0) {
                $(`.num`).val(1).trigger('input');
            } else {
                $(`.num`).val(b).trigger('input');
            }
        }
        var currency = {!! collect(currency()->getCurrency(session('currency'))) !!};
        var instock = {{ $product->instock }};
        var price = {{ $product->selling_price }};
        var price_range = {!! collect($product->prices) !!};
        $(`.num`).on(`input`, function(e) {
            var a = $(this).val();
            if (a > instock) {
                a = instock;
                $(this).val(a);
            }
            if (price_range.length) {
                $.each(price_range, (i, p) => {
                    if (a >= p.qty) {
                        price = p.price;
                    }
                });
            }
            var t = Intl.NumberFormat(currency.code, {
                style: 'currency',
                currency: currency.code
            }).format(((price * a) * currency.exchange_rate));
            $(`.total h2`).text(`${currency.symbol}${t.replace('$','').replace('KHR','')}`);
            var cart_url = `{{ route('front.cartadd', $product->id) }}`;
            var order_url = `{{ route('front.account.orderadd', $product->id) }}`;
            $(this).parents(`.m-actionsheet`).find(`.yellow-color`).attr('href', `${cart_url}?qty=${a}`);
            $(this).parents(`.m-actionsheet`).find(`.red-color`).attr('href', `${order_url}?qty=${a}`);
        });
    </script>
@endpush
