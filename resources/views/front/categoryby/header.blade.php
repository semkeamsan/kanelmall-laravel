<header class="aui-header-default aui-header-fixed ">
    <a href="#" onclick="if(document.referrer) {window.open(document.referrer,'_self');} else {history.go(-1);} return false;" class="aui-header-item">
        <i class="aui-icon aui-icon-back"></i>
    </a>
    <div class="aui-header-center aui-header-center-clear">
        <form action="{{ route('front.categoryby', $category->id) }}" class="aui-header-search-box">
            <div class="px-2">
                <i class="aui-icon aui-icon-small-search"></i>
                <input name="q" type="text" placeholder="{{ __('Search') }}, {{ __('Products') }}..." class="aui-header-search"
                    value="{{ request('q') }}">
            </div>
                <div id="live-search" class="d-none bg-white position-relative top--1 border border-top-0">
                    <ul style="max-height: 300px;height: auto;overflow-y: auto;padding: 10px;">

                    </ul>
                </div>
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
<script>
    window.items = {!! $products !!};
    window.searchURL = `{{ route('front.product','') }}`;
</script>
