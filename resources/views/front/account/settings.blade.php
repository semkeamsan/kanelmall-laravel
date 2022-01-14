@extends('layouts.front')
@section('content')
    <header class="aui-header-default aui-header-fixed">
        <a href="{{ route('front.account.index') }}" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{ __('Settings') }}</div>
            </div>
        </div>
    </header>
    <section class="aui-myOrder-content">
        <div class="aui-product-set">

            <a href="{{ route('front.account.personal') }}" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
                <div class="aui-address-cell-bd">{{ __('Personal information') }}</div>
                <div class="aui-address-cell-ft"></div>
            </a>

            <a href="{{ route('front.account.authentication') }}"
                class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
                <div class="aui-address-cell-bd">{{ __('My authentication') }}</div>
                <div class="aui-address-cell-ft"></div>
            </a>
            <a href="{{ route('front.account.address') }}" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear">
                <div class="aui-address-cell-bd">{{ __('My shipping address') }}</div>
                <div class="aui-address-cell-ft"></div>
            </a>
            <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear"
                data-ydui-actionsheet="{target:'#action-languages',closeElement:'#cancel'}">
                <div class="aui-address-cell-bd">{{ __('Languages') }}</div>
                <div class="aui-address-cell-ft">
                    <img width="26" src="{{ asset('images/flags/' .app()->getLocale() . '.svg') }}" />
                </div>
            </a>
            <a href="#" class="aui-address-cell aui-fl-arrow aui-fl-arrow-clear"
                data-ydui-actionsheet="{target:'#action-currency',closeElement:'#cancel'}">
                <div class="aui-address-cell-bd">{{ __('Currency') }}</div>
                <div class="aui-address-cell-ft">
                    {{ session('currency') }}
                </div>

            </a>
        </div>

    </section>
    <div class="m-actionsheet" id="action-languages">
        <div style="position:relative">
            <div class="aui-product-text-content">
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
            <a href="#" class="actionsheet-action" id="cancel"></a>
        </div>
    </div>
    <div class="m-actionsheet" id="action-currency">
        <div style="position:relative">
            <div class="p-3 border-bottom text-left">
                <h4>{{ __('Currency') }}</h4>
            </div>
            <div class="aui-product-text-content">
                @foreach (DB::table('currencies')->get() as $currency)
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <a class="border-0 d-flex {{ $currency->code == session('currency') ? 'active' : null }}"
                                href="{{ route('currency.set',$currency->code) }}">
                                <span class="px-2">{{ $currency->code }} ( {{ $currency->symbol }} )</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="actionsheet-action" id="cancel"></a>
        </div>
    </div>

    <div class="aui-out position-fixed w-100 bottom-0">
        {!! Form::open(['url' => route('logout')]) !!}
        <button type="submit">
            <i class="fal fa-sign-out-alt"></i>
            <span>{{ __('Logout') }}</span>
        </button>
        {!! Form::close() !!}
    </div>
@endsection
