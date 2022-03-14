<div id="livewire">
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
    <div class="m-actionsheet" id="action-languages" wire:ignore>
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

    <section class="aui-cart-content">
        <div class="aui-cart-box">
            {{-- @auth
                @include('front.account.action')
            @endauth --}}
            @if ($response)
                <div class="alert alert-{{ $response['type'] }} alert-dismissible fade show m-1" role="alert">
                    <strong>
                        @if ($response['type'] == 'success')
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        @endif
                    </strong>
                    {{ $response['message'] }}
                    @if (@$response['link'])
                        <a class="btn btn-sm text-white" href="{{ $response['link'] }}">{{ __('Link') }}</a>
                    @endif
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                        style="top: 50%">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="aui-cart-box-list border-top">
                @if (count($products))
                    <ul>
                        @foreach ($products as $key => $product)
                            <li class="shop-info">
                                <div class="aui-list-title-info">
                                    <div class="aui-list-product-fl-item">
                                        <div class="aui-cart-box-list-img border-right" wire:ignore>
                                            <div class="aui-list-product-fl-img">
                                                <a href="{{ route('front.product', $product['id']) }}">
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
                                                        <img data-src="{{ $product['image_url'] }}"
                                                            src="{{ asset('images/bg/log.jpg') }}">
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                        <div class="aui-cart-box-list-text py-2">
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

                                                    @php
                                                        $price = $product['selling_price'];
                                                    @endphp
                                                    @if ($product['prices'])
                                                        {{-- <b class="price">
                                                        {{ currency(min(array_column($product['prices'], 'price')), 'USD', session('currency')) }}
                                                    </b> --}}

                                                        @foreach ($product['prices'] as $p)
                                                            @if ($product['qty'] >= $p['qty'])
                                                                @php
                                                                    $price = $p['price'];
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <b class="price">
                                                        {{ currency($price, 'USD', session('currency')) }}
                                                    </b>
                                                    {{-- @if ($product['promotion'])
                                                        <small style="text-decoration: line-through;color:#ddd">
                                                            {{ currency($product['price'], 'USD', session('currency')) }}
                                                        </small>
                                                    @endif --}}
                                                </div>
                                            </div>

                                            <div class="aui-cart-box-list-text-price d-none">
                                                <div class="aui-cart-box-list-text-arithmetic">
                                                    <a href="javascript:void(0);" class="minus"
                                                        wire:click="qtyremove({{ $key }})">-</a>
                                                    <input type="number" class="num"
                                                        {{ $product['instock'] > 0 ?: 'disabled' }}
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
                                                    {{ __('Quantity') }} :
                                                    <span class="aui-list-product-item-price" id="total-price">
                                                        {{ $product['qty'] }}
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="aui-list-product-fl-mes">
                                                <span class="aui-list-product-item-total-price">
                                                    {{ __('Total') }} :
                                                    <span class="aui-list-product-item-price" id="total-price">
                                                        @if ($product['qty'])
                                                            {{ currency($price * $product['qty'], 'USD', session('currency')) }}
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
            <table class="table table-sm">
                <tr>
                    <td>
                        {{ __('Coupon code') }}
                    </td>
                    <td>

                        <input wire:model.debounce.1000ms="coupon" type="text" class="form-control form-control-sm"
                            placeholder="{{ __('Coupon code') }}">
                        @if ($coupon_message)
                            <div class="error-feedback d-block">
                                {{ $coupon_message }}
                            </div>
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('Total') }}
                    </td>
                    <td>

                        <b>
                            {{ currency($total, 'USD', session('currency')) }}
                            @if ($total_coupon)
                                ⟶ {{ currency($total_coupon, 'USD', session('currency')) }}
                            @endif
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ __('Shipping fee') }}
                    </td>
                    <td>
                        <select wire:model="shipping_fee" class="form-control form-control-sm select2">
                            @foreach (session('shippings') as $item)
                                <option value="{{ $item->id }}" {{ $loop->first ? 'selected' : null }}>
                                    {{ __(trim($item->name)) }} -
                                    {{ $item->packing_charge_type == 'fixed'? currency($item->packing_charge, 'USD', session('currency')): $item->packing_charge . '%' }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                @if ($total_price)
                    <tr>
                        <td>
                            {{ __('Total Price') }}
                        </td>
                        <td>
                            <h3 class="text-primary">
                                {{ currency($total_price, 'USD', session('currency')) }}
                            </h3>
                        </td>
                    </tr>
                @endif
            </table>


            @if ($total)
                <div class="aui-payment-bar border-top">
                    @auth
                        <button wire:click.prevent="togglecheckout"
                            class="settlement w-100">{{ __('Make Payment') }}</button>
                    @else
                        <button class="settlement w-100"
                            onclick="location.href=`{{ route('login') }}`">{{ __('Login') }}</button>
                    @endauth
                </div>
            @endif

        @endif
    </section>
    @auth
        <div class="m-actionsheet {{ $checkout ? 'actionsheet-toggle' : null }}" id="action-checkout">
            <div style="position:relative">
                <div class="p-3 border-bottom text-left">
                    <h4>{{ __('Payment') }}</h4>
                </div>
                <div class="aui-product-text-content">
                    <label for="location" class="form-control-label">{{ __('Location') }}</label>
                    @if (collect($rules)->get('province'))
                        <span class="text-danger text-xs">*</span>
                    @endif
                    <div class="px-2 border rounded">
                        <div class="aui-product-text-content-list">
                            <div class="aui-product-text-content-list-ft">
                                <span>
                                    <label for="province" class="form-control-label d-none">{{ __('Province') }}</label>
                                    {{-- @if (collect($rules)->get('province'))
                                    <span class="text-danger text-xs">*</span>
                                @endif --}}
                                    <select class="form-control select2" wire:model="province" wire:change="province"
                                        data-placeholder="{{ __('Province') }}">
                                        @foreach ($provinces as $item)
                                            <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province')
                                        <div class="error-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                        </div>

                        @if ($districts)
                            <div class="aui-product-text-content-list">
                                <div class="aui-product-text-content-list-ft">
                                    <span>
                                        <label for="district"
                                            class="form-control-label d-none">{{ __('District') }}</label>
                                        {{-- @if (collect($rules)->get('district'))
                                        <span class="text-danger text-xs">*</span>
                                    @endif --}}
                                        <select class="form-control select2" wire:model="district">
                                            <option value="">{{ __('Please Select') }} / {{ __('District') }}</option>
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->translation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('district')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if ($communes)
                            <div class="aui-product-text-content-list">
                                <div class="aui-product-text-content-list-ft">
                                    <span>
                                        <label for="commune"
                                            class="form-control-label d-none">{{ __('Commune') }}</label>
                                        {{-- @if (collect($rules)->get('commune'))
                                        <span class="text-danger text-xs">*</span>
                                    @endif --}}
                                        <select class="form-control select2" wire:model="commune">
                                            <option value="">{{ __('Please Select') }} / {{ __('Commune') }}</option>
                                            @foreach ($communes as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->translation->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('commune')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        @endif
                        {{-- @if ($villages)
                        <div class="aui-product-text-content-list">
                            <div class="aui-product-text-content-list-ft">
                                <span>
                                     <label for="village" class="form-control-label">{{ __('Village') }}</label>
                                    @if (collect($rules)->get('village'))
                                        <span class="text-danger text-xs">*</span>
                                    @endif
                                    <select class="form-control select2" wire:model="village">
                                        <option value="">{{ __('Please Select') }} / {{ __('Village') }}</option>
                                        @foreach ($villages as $item)
                                            <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('village')
                                        <div class="error-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </span>
                            </div>
                        </div>
                    @endif --}}
                    </div>
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <span>

                                <label for="address" class="form-control-label">{{ __('My shipping address') }}</label>
                                @if (collect($rules)->get('address'))
                                    <span class="text-danger text-xs">*</span>
                                @endif
                                @if ($commune)
                                    <a href="#" class="float-right"
                                        wire:click.prevent="samelocation">{{ __('Same Location') }}</a>
                                @endif
                                <textarea rows="1" class="form-control" wire:model="address" cols="50"></textarea>
                                @error('address')
                                    <div class="error-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @else
                                    <div class="invalid-feedback">
                                        {{ __('validation.required', ['attribute' => __('Address')]) }}
                                    </div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <span>
                                <label for="phone" class="form-control-label">{{ __('Phone') }}</label>
                                @if (collect($rules)->get('phone'))
                                    <span class="text-danger text-xs">*</span>
                                @endif
                                {!! Form::text('phone', auth()->user()->phone, ['class' => 'form-control', 'wire:model' => 'phone']) !!}
                                @error('phone')
                                    <div class="error-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <span>

                                <label for="map" class="form-control-label">{{ __('Map') . ' (Embed) ' }}</label>
                                @if (collect($rules)->get('latitude') || collect($rules)->get('longitude'))
                                    <span class="text-danger text-xs">*</span>
                                @endif
                                <button class="float-right btn btn-sm mr-0" data-toggle="map">
                                    <i class="fas fa-map-marked-alt"></i>
                                </button>
                                <div class="input-group">
                                    <input class="form-control" placeholder="{{ __('Latitude') }}"
                                        wire:model="latitude" type="text">
                                    <input class="form-control" placeholder="{{ __('Longitude') }}"
                                        wire:model="longitude" type="text">
                                </div>

                                @if ($latitude && $longitude)
                                    <iframe
                                        src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl={{ app()->getLocale() }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                        width="100%" height="100" class="border"></iframe>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <span>
                                <label for="payment_method" class="form-control-label">{{ __('Payment Via') }}</label>
                                @if (collect($rules)->get('payment_via') || collect($rules)->get('payment_image'))
                                    <span class="text-danger text-xs">*</span>
                                @endif
                                <div class="form-row">
                                    <div class="col-5 col-xl-6">
                                        <select class="form-control select2-image" wire:model="payment_via"
                                            data-minimum-results-for-search="Infinity">
                                            <option data-src="{{ asset('images/aba.png') }}" value="aba">
                                                {{ __('ABA') }}</option>
                                            <option data-src="{{ asset('images/acleda.png') }}" value="acleda">
                                                {{ __('Acleda') }}</option>
                                            <option data-src="{{ asset('images/true_money.png') }}" value="true_money">
                                                {{ __('True Money') }}</option>
                                            <option data-src="{{ asset('images/e_money.png') }}" value="e_money">
                                                {{ __('e-Money') }}</option>
                                            <option data-src="{{ asset('images/wing.png') }}" value="wing">
                                                {{ __('Wing') }}</option>
                                        </select>
                                    </div>
                                    <div class="col col-xl-6">
                                        <label class="btn m-0 p-2 form-control"
                                            for="payment_image">{{ __('Upload Payment') }} (1MB)</label>
                                        <input type="file" class="form-control d-none" wire:model="payment_image"
                                            accept="image/*" id="payment_image">

                                    </div>
                                    <div class="col-12">
                                        @error('payment_via')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                        @if ($payment_image)
                                            <div class="col p-3 border">
                                                <div class="avatar rounded bg-transparent w-100 h-100">
                                                    @if (gettype($payment_image) == 'string')
                                                        <img class="w-100" src="{{ $payment_image }}">
                                                    @else
                                                        <img class="w-100"
                                                            src="{{ $payment_image->temporaryUrl() }}">
                                                    @endif
                                                </div>
                                            </div>
                                        @else
                                            @error('payment_image')
                                                <div class="error-feedback d-block">
                                                    {{-- {{ $message }} --}}
                                                    {{ __('The image bigger',['size' => '1MB']) }}
                                                </div>
                                            @enderror

                                            <div class="error-feedback d-block">
                                                {{ __('Please upload payment to continue') }}...
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-12 my-2">
                                        <fieldset class="border px-2">
                                            <legend class="w-auto text-sm">{{ __('How to pay') }}</legend>
                                            <p class="text-ssm" style="white-space: pre-line">{!! session('business.how_to_pay') !!}</p>
                                        </fieldset>
                                    </div>
                                </div>

                            </span>
                        </div>
                    </div>
                </div>

                <a href="javascript:void(0);" class="actionsheet-action" id="cancel"
                    wire:click.prevent="togglecheckout"></a>
                @if ($payment_image)
                    <div class="aui-product-function">
                        <button class="red-color w-100" wire:click="payment">
                            {{ __('Payment') }}
                        </button>
                    </div>
                @endif
            </div>
        </div>
        @if ($checkout)
            <div class="mask-black" wire:click.prevent="togglecheckout"></div>
        @endif
        <div wire:loading wire:target="payment_image">
            <div class="swal2-container swal2-center swal2-fade swal2-shown"
                class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
                <div class="swal2-header">
                    <h2 class="swal2-title text-white" id="swal2-title">
                        {{ __('Uploading') }}...
                    </h2>
                </div>
                <div class="swal2-actions swal2-loading" style="display: flex;">
                    <div class="swal2-confirm swal2-styled"
                        style="border-left-color: var(--primary); border-right-color: var(--primary); display: flex;">
                    </div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="payment">
            <div class="swal2-container swal2-center swal2-fade swal2-shown"
                class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
                <div class="swal2-header">
                    <h2 class="swal2-title text-white" id="swal2-title">
                        {{ __('Processing') }} {{ __('Payment') }}
                    </h2>
                </div>
                <div class="swal2-actions swal2-loading" style="display: flex;">
                    <div class="swal2-confirm swal2-styled"
                        style="border-left-color: var(--primary); border-right-color: var(--primary); display: flex;">
                    </div>
                </div>
            </div>
        </div>
        <div wire:loading wire:target="togglecheckout,remove,samelocation">
            <div class="swal2-container swal2-center swal2-fade swal2-shown"
                class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
                <div class="swal2-header">
                    <h2 class="swal2-title text-white" id="swal2-title">
                        {{ __('Processing') }}
                    </h2>
                </div>
                <div class="swal2-actions swal2-loading" style="display: flex;">
                    <div class="swal2-confirm swal2-styled"
                        style="border-left-color: var(--primary); border-right-color: var(--primary); display: flex;">
                    </div>
                </div>
            </div>
        </div>
    @endauth

    @include('front.navbar.footer')
</div>
