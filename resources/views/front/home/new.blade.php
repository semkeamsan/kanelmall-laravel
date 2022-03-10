@if ($new->count())
<div class="aui-title-head">
    <h4 class="text-center py-1">{{ __('New') }}</h4>
</div>
    <div class="aui-slide-box">
        <div class="aui-slide-list">
            <ul class="aui-slide-item-list">
                @foreach ($new as $product)
                    <li class="aui-slide-item-item border rounded">
                        {{-- @if ($product->enable_stock && $product->instock)
                            <div class="aui-top-action">
                                <a href="{{ route('front.cartadd',$product->id) }}" class="aui-top-action-item aui-add-cart {{ Cart::exists($product->id) ? 'd-none' : null }}" data-toggle="add-cart">
                                    <i class="fa fa-cart-plus text-white"></i>
                                </a>
                            </div>
                        @endif --}}
                        <a href="{{ route('front.product', $product->id) }}" class="v-link">
                            <img class="v-img"  data-src="{{ $product->image_url }}" src="{{ asset('images/bg/log.png') }}">
                            <p class="aui-slide-item-title aui-slide-item-f-els">{{ $product->name }}
                            </p>
                            <p class="aui-slide-item-info aui-list-product-mes-box">
                                <span class="aui-slide-item-price">
                                    {{ currency($product->selling_price, 'USD', session('currency')) }}
                                </span>
                                @if (count($product->prices) == 0)
                                    @if ($product->promotion)
                                        <span class="aui-slide-item-price">
                                            {{ currency($product->price, 'USD', session('currency')) }}
                                        </span>
                                    @endif
                                @endif
                                @if ($product->enable_stock && $product->instock)
                                    <span class="aui-comment font-weight-bold text-green"><i class="fa fa-check"></i> {{ __('Instock') }}</span>
                                @endif
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

@endif
