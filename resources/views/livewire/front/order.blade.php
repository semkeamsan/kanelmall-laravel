<div id="livewire">
    <header class="aui-header-default aui-header-fixed">
        <a href="#back" onclick="history.back()" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{ __('My Orders') }}</div>
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
                                <span class="px-2">{{ $currency->code }} - (
                                    {{ $currency->symbol }})</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="actionsheet-action" id="cancel"></a>
        </div>
    </div>
    <section class="aui-myOrder-content">

        <div class="aui-header-fixed bg-white border-bottom" style="top:auto">
            @include('front.account.action')
        </div>
        <div class="pt-6 pb-5">
            @if ($orders->count())
                @foreach ($orders as $k => $order)
                    <form class="needs-validation px-1 pb-2" wire:submit.prevent="payment" novalidate>
                        <div class="demo-small-pitch border">
                            <div class="aui-well border-bottom">
                                <div class="aui-well-bd">
                                    {{ $order->created_at->translatedFormat('d-M-Y') }}
                                    @if ($order->status == 'received')
                                        -
                                        {{ $order->updated_at->translatedFormat('d-M-Y') }}
                                    @endif
                                </div>
                                <div class="aui-well-ft">{{ __(Str::title($order->status)) }}</div>
                            </div>
                            <div class="text-right px-1 d-none" data-toggle="count-down"
                                data-date="{{ $order->created_at->addDays(2) }}"
                                title="{{ __('Your oder will remove on date.') }}"></div>
                            <ul>
                                @foreach ($order->products as $j => $o)
                                    <li data-orderid="{{ $o->id }}">
                                        <div class="aui-list-title-info">
                                            <div class="aui-list-product-fl-item">
                                                <div class="aui-list-product-fl-img" wire:ignore>
                                                    <a href="{{ route('front.product', $o->product->id) }}">
                                                        @if ($o->product->video_url)
                                                            <div class="video position-relative">
                                                                <video autoplay muted
                                                                    src="{{ $o->product->video_url }}"></video>
                                                                <div class="bottom-2 position-absolute right-2"
                                                                    data-toggle="muted">
                                                                    <i class="fa fa-2x fa-volume-mute text-white"></i>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <img data-src={{ $o->product->image_url }}
                                                                src="{{ asset('images/bg/log.jpg') }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="aui-list-product-fl-text">
                                                    <h3 class="aui-list-product-fl-title">
                                                        {{ $o->product->name }}
                                                    </h3>
                                                    <div class="aui-list-product-fl-mes">
                                                        <div class="aui-cart-box-list-text-price">
                                                            <div class="aui-cart-box-list-text-pri">
                                                                @if ($o->product->prices)
                                                                    <b class="price">
                                                                        {{ currency(min(array_column($o->product->prices, 'price')), 'USD', session('currency')) }}
                                                                    </b>
                                                                @else
                                                                    <b class="price">
                                                                        {{ currency($o->product->selling_price, 'USD', session('currency')) }}
                                                                    </b>
                                                                @endif
                                                                @if ($o->product->promotion)
                                                                    <small
                                                                        style="text-decoration: line-through;color:#ddd">
                                                                        {{ currency($o->product->price, 'USD', session('currency')) }}
                                                                    </small>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="aui-list-product-fl-mes">
                                                        <div class="aui-btn-purchase">
                                                            @if ($order->status == 'pending' || $order->status == 'cancel')
                                                                <div class="aui-cart-box-list-text-arithmetic">
                                                                    <a href="javascript:void(0);" class="minus"
                                                                        wire:click="qtyremove({{ $order->id }},{{ $o->id }})">
                                                                        <span>-</span>
                                                                    </a>
                                                                    <input type="number" class="num"
                                                                        wire:model="qty.{{ $o->id }}"
                                                                        wire:input="qty({{ $order->id }},{{ $o->id }})">
                                                                    <a href="javascript:void(0);" class="plus"
                                                                        wire:click="qtyadd({{ $order->id }},{{ $o->id }})">
                                                                        <span>+</span>
                                                                    </a>

                                                                </div>
                                                            @else
                                                                <span>{{ __('Quantity') }} :
                                                                    {{ $o->qty }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="aui-list-product-fl-mes">
                                                        <span class="aui-list-product-item-total-price">
                                                            {{ __('Total') }} :
                                                            <span class="aui-list-product-item-price" id="total-price">
                                                                {{ currency($o->price * $o->qty, 'USD', session('currency')) }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    @if ($order->status == 'pending' || $order->status == 'cancel')
                                                        <div class="aui-list-product-fl-mes">
                                                            <div class="aui-list-title-btn">
                                                                <a href="#"
                                                                    wire:click.prevent="remove({{ $order->id }},{{ $o->id }})">
                                                                    {{ __('Cancel') }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @if ($order->status == 'pending' || $order->status == 'cancel')
                                <div class="aui-payment-bar border-bottom">
                                    <div class="shop-total">
                                        <strong>
                                            {{ __('Total') }} :
                                            {{ currency($order->products->sum('total_price'), 'USD', session('currency')) }}
                                        </strong>
                                    </div>
                                    <button type="submit" class="settlement"
                                        wire:click.prevent="togglecheckout({{ $order->id }})">{{ __('Make Payment') }}</button>
                                </div>

                            @endif
                            @if ($order->status != 'pending')
                                <div class="aui-list-title-btn" wire:ignore>
                                    <div class="p-1">
                                        <div>
                                            {{ __('Address') }} : <span>{{ $order->address }}</span>
                                        </div>
                                        <div class="pb-1">
                                            {{ __('Payment Via') }} :
                                            <span>{{ Str::upper($order->payment_via) }}</span>
                                        </div>
                                        @if ($order->comment)
                                            <div class="pb-1">
                                                {{ __('Comment') }} :
                                                <span>{{ $order->comment }}</span>
                                            </div>
                                        @endif
                                        <div class="pb-1">
                                            {{ __('Total') }} :
                                            <span>
                                                {{ currency($order->total_price ?? $order->products->sum('total_price'), 'USD', session('currency')) }}</span>
                                        </div>
                                        @if ($order->payment_image)
                                            <div>
                                                <a href="{{ $order->payment_image }}" target="_blank"
                                                    class="w-100" style="height: 200px; overflow: hidden">
                                                    <img class="w-100 h-100" src="{{ $order->payment_image }}"
                                                        style="object-fit: cover">
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            @if ($order->status == 'paid' || $order->status == 'delivered')
                                <div class="form-row p-2">
                                    <div class="col">
                                        <textarea wire:model="comments.{{ $order->id }}" class="form-control"
                                            placeholder="{{ __('Comment') }}"></textarea>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary"
                                            wire:click.prevent="receive({{ $order->id }})">
                                            {{ __('Receive') }}
                                        </button>
                                    </div>
                                </div>
                            @endif
                            @if ($order->status == 'received' || $order->status == 'cancel')
                                <div class="aui-list-product-fl-mes p-2">
                                    <div class="aui-list-title-btn">
                                        <a href="{{ route('front.account.orderremove', $o->id) }}"
                                            wire:click.prevent="orderdelete({{ $order->id }})">
                                            {{ __('Delete') }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>
                @endforeach
            @endif
        </div>
    </section>
    <div class="m-actionsheet {{ $checkout ? 'actionsheet-toggle' : null }}" id="action-checkout">
        <div style="position:relative">
            <div class="p-3 border-bottom text-left">
                <h4>{{ __('Payment') }}</h4>
            </div>
            <div class="aui-product-text-content">
                <label for="location" class="form-control-label">{{ __('Location') }}</label>
                <div class="px-2 border rounded">
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <span>
                                <label for="province" class="form-control-label">{{ __('Province') }}</label>
                                @if (collect($rules)->get('province'))
                                    <span class="text-danger text-xs">*</span>
                                @endif
                                <select class="form-control select2" wire:model="province" wire:change="province">
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
                                    <label for="district" class="form-control-label">{{ __('District') }}</label>
                                    @if (collect($rules)->get('district'))
                                        <span class="text-danger text-xs">*</span>
                                    @endif
                                    <select class="form-control select2" wire:model="district">
                                        @foreach ($districts as $item)
                                            <option value="">{{ __('Please Select') }}</option>
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
                                    <label for="commune" class="form-control-label">{{ __('Commune') }}</label>
                                    @if (collect($rules)->get('commune'))
                                        <span class="text-danger text-xs">*</span>
                                    @endif
                                    <select class="form-control select2" wire:model="commune">
                                        @foreach ($communes as $item)
                                            <option value="">{{ __('Please Select') }}</option>
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
                            @if ($communes)
                                <a href="#" class="float-right"
                                    wire:click.prevent="samelocation">{{ __('Same Location') }}</a>
                            @endif
                            <textarea rows="2" class="form-control" wire:model="address" cols="50"></textarea>
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
                                    width="100%" height="270" class="border"></iframe>
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
                                <div class="col-6">
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
                                <div class="col-6">
                                    <label class="btn m-0 p-2 form-control"
                                        for="payment_image">{{ __('Upload Payment') }}</label>
                                    <input type="file" class="form-control d-none" wire:model="payment_image"
                                        accept="image/*" id="payment_image">

                                </div>
                            </div>
                            @error('payment_via')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('payment_image')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div wire:loading wire:target="payment_image">{{ __('Uploading') }}...</div>
                            @if ($payment_image)
                                <div class="col p-3 border">
                                    <div class="avatar rounded bg-transparent w-100 h-100">
                                        @if (gettype($payment_image) == 'string')
                                            <img class="w-100" src="{{ $payment_image }}">
                                        @else
                                            <img class="w-100" src="{{ $payment_image->temporaryUrl() }}">
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <a href="javascript:void(0);" class="actionsheet-action" id="cancel"
                wire:click.prevent="togglecheckout({{ $checkoutid }})"></a>
            @if ($payment_image)
                <div class="aui-product-function">
                    <button class="red-color w-100"
                        wire:click="payment({{ $checkoutid }})">{{ __('Payment') }}</button>
                </div>
            @endif

        </div>
    </div>
    @include('front.navbar.footer')
    @if ($checkout)
        <div class="mask-black" wire:click.prevent="togglecheckout({{ $checkoutid }})"></div>
    @endif
    @if ($response)
        <script>
            Swal.fire({
                toast: true,
                type: `{{ $response['type'] }}`,
                html: `<span>{{ $response['message'] }}</span>`,
                showConfirmButton: false,
                timer: 3000,
            });
        </script>
        {{-- @if (@$response['status'] == 'received' || @$response['status'] == 'cancel')
            <script>
                location.reload();
            </script>
         @endif --}}
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            Livewire.hook('element.updated', (el, component) => {

            });
        });

        $(document).on('click', `[data-toggle="map"]`, function(e) {
            e.preventDefault();

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    @this.set('latitude', position.coords.latitude);
                    @this.set('longitude', position.coords.longitude);
                }, function(error) {
                    Swal.fire({
                        toast: true,
                        type: 'error',
                        html: `<span>${error.message}</span>`,
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    console.warn(`ERROR(${error.code}): ${error.message}`);
                }, {
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                });
            } else {
                Swal.fire({
                    toast: true,
                    type: 'error',
                    html: `<span>Geolocation is not supported by this browser.</span>`,
                    showConfirmButton: false,
                    timer: 3000,
                });

            }
        });
    </script>
@endpush
