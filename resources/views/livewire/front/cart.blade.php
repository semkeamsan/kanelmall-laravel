<div>
    <header class="aui-header-default aui-header-fixed">
        <div class="aui-header-center aui-header-center-clear">
            <div class="">{{ __('Shopping Cart') }} <span id="cart-count">{{ Cart::count() }}</span>
            </div>
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

    <form wire:submit.prevent="order">
        @csrf
        <section class="aui-cart-content">
            <div class="aui-cart-box">
                @auth
                    @include('front.account.action')
                @endauth
                <div class="aui-cart-box-list">
                    @if (count($products))
                        <ul>
                            @foreach ($products as $key => $product)

                                <li class="shop-info">
                                    <div class="aui-cart-box-list-item">
                                        <div class="aui-cart-box-list-img" wire:ignore>
                                            <div class="aui-list-product-fl-img">
                                                <a href="{{ route('front.product',$product['id']) }}">
                                                @if ($product['video_url'])
                                                    <div class="video position-relative">
                                                        <video autoplay muted
                                                            src="{{ $product['video_url'] }}"></video>
                                                        <div class="bottom-2 position-absolute right-2"
                                                            data-toggle="muted">
                                                            <i class="fa fa-2x fa-volume-mute text-white"></i>
                                                        </div>
                                                    </div>
                                                @else
                                                    <img data-src={{ $product['image_url'] }}
                                                        src="{{ asset('images/bg/log.jpg') }}">
                                                @endif
                                            </a>
                                            </div>
                                        </div>
                                        <div class="aui-cart-box-list-text">
                                            <span>
                                                {{ $product['name'] }}
                                            </span>
                                            @if ($product['description'])
                                                <div class="aui-cart-box-list-text-brief">
                                                    {!! $product['description'] !!}
                                                </div>
                                            @endif

                                            <div class="aui-cart-box-list-text-price">
                                                <div class="aui-cart-box-list-text-pri">

                                                    @if ($product['prices'])
                                                        <b class="price">
                                                            {{ currency(min(array_column($product['prices'], 'price')), 'USD', session('currency')) }}
                                                        </b>
                                                    @else
                                                        <b class="price">
                                                            {{ currency($product['selling_price'], 'USD', session('currency')) }}
                                                        </b>
                                                    @endif

                                                    @if ($product['promotion'])
                                                        <small style="text-decoration: line-through;color:#ddd">
                                                            {{ currency($product['price'], 'USD', session('currency')) }}
                                                        </small>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="aui-cart-box-list-text-price">
                                                <div class="aui-cart-box-list-text-arithmetic">
                                                    <a href="javascript:void(0);" class="minus"
                                                        wire:click="qtyremove({{ $key }})">-</a>
                                                    <input type="number" class="num" {{ $product['instock'] > 0 ?: 'disabled' }}
                                                        wire:model="products.{{ $key }}.qty"
                                                        value="{{ $product['qty'] }}">
                                                    <a href="javascript:void(0);" class="plus"
                                                        wire:click="qtyadd({{ $key }})">+</a>
                                                </div>
                                                {{-- @if ($product['qty'] > $product['instock'])
                                                    <span id="outstock" class="text-danger">
                                                        {{ __('In Stock') }}
                                                        {{ $product['instock'] }}
                                                    </span>
                                                @endif --}}
                                            </div>
                                            <div class="aui-list-product-fl-mes">
                                                <span class="aui-list-product-item-total-price">
                                                    {{ __('Total') }} :
                                                    <span class="aui-list-product-item-price"
                                                        id="total-price">
                                                        @if ($product['qty'])
                                                            @if ($product['prices'])
                                                                {{ currency(max(array_column($product['prices'], 'price')) * $product['qty'], 'USD', session('currency')) }}
                                                            @else
                                                                {{ currency($product['selling_price'] * $product['qty'], 'USD', session('currency')) }}
                                                            @endif
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>

                                            <div class="aui-cart-box-list-text-price">
                                                <a href="{{ route('front.cartremove', $product['id']) }}"
                                                    wire:click.prevent="remove({{ $key }})">
                                                    <i class="fal fa-trash"></i>
                                                    {{ __('Remove') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="aui-recommend p-2">
                            <a href="{{ route('front.search') }}">
                                <div class="border border-primary py-1 text-primary">
                                    <small>{{ __('Go to Products') }}</small>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            @if (count($products))
            <div>
                <input type="text" class="form-control rounded-0" name="couponcode" placeholder="{{ __('Coupon code') }}">
            </div>
                <div class="aui-payment-bar border-top">

                    <div class="shop-total">
                        <strong>
                            {{ __('Total') }} : {{ currency($total, 'USD', session('currency')) }}

                        </strong>
                    </div>
                    <button type="submit" class="settlement">{{ __('Order') }}</button>
                </div>
            @endif
        </section>

    </form>
    @include('front.navbar.footer')

</div>
