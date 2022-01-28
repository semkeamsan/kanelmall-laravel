@if ($products->count())
    <section class="aui-list-product" data-page="">
        @foreach ($products as $product)
            <div class="aui-list-product-item col-4">
                {{-- @if ($product->enable_stock && $product->instock)
                    <div class="aui-top-action">
                        <a href="{{ route('front.cartadd', $product->id) }}"
                            class="aui-top-action-item aui-add-cart {{ Cart::exists($product->id) ? 'd-none' : null }}"
                            data-toggle="add-cart">
                            <i class="fa fa-cart-plus text-white"></i>
                        </a>
                    </div>
                @endif --}}
                <a href="{{ route('front.product', $product->id) }}">
                    <div class="aui-list-product-item-img">
                        @if ($product->video_url)
                            <div class="video position-relative">
                                <video autoplay muted src="{{ $product->video_url }}"></video>
                                <div class="bottom-2 position-absolute right-2" data-toggle="muted">
                                    <i class="fa fa-2x fa-volume-mute text-white"></i>
                                </div>
                            </div>
                        @else
                            <img data-src={{ $product->image_url }} src="{{ asset('images/bg/log.jpg') }}">
                        @endif

                    </div>
                    <div class="aui-list-product-item-text">
                        <h3> {{ $product->name }} </h3>
                        <div class="aui-list-product-mes-box">
                            @if (count($product->prices) > 1)
                                <div>
                                    <span class="aui-list-product-item-price">
                                        {{ currency(min(array_column($product->prices, 'price')), 'USD', session('currency')) }}
                                    </span>
                                </div>
                            @else
                                <div>
                                    <span class="aui-list-product-item-price">
                                        {{ currency($product->selling_price, 'USD', session('currency')) }}
                                    </span>
                                    @if ($product->promotion)
                                        <span class="aui-list-product-item-del-price">
                                            {{ currency($product->price, 'USD', session('currency')) }}
                                        </span>
                                    @endif

                                </div>
                            @endif

                            @if ($product->enable_stock && $product->instock)
                                <div class="aui-comment"><i class="fa fa-check"></i> {{ __('Instock') }}</div>
                            @endif
                        </div>
                    </div>
                </a>
            </div>

        @endforeach
    </section>

@else
    @if (request('q'))
        <section class="" data-page="">
            <div class="aui-recommend py-3">
                <h4>{{ __('No results') }} : <small>{{ request('q') }}</small></h4>
            </div>
        </section>
    @endif
@endif
