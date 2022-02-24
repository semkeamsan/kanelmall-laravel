@if ($products->count())
    <section class="aui-list-product" data-page="1">
        @foreach ($products as $product)
            <div class="aui-list-product-item col-6">
                <div class="aui-top-action">
                    {{-- @if ($product->promotion)
                        <a href="{{ route('front.product', $product->id) }}">
                            <div class="ribbon ribbon-top-left">
                                <span> {{ $product->promotion->name }}</span>
                            </div>
                        </a>
                    @endif --}}
                    {{-- @if ($product->enable_stock && $product->instock)
                        <a href="{{ route('front.cartadd', $product->id) }}"
                            class="aui-top-action-item aui-add-cart {{ Cart::exists($product->id) ? 'd-none' : null }}"
                            data-toggle="add-cart">
                            <i class="fa fa-cart-plus text-white"></i>
                        </a>
                    @endif --}}
                </div>
                <a href="{{ route('front.product', $product->id) }}">
                    <div class="aui-list-product-item-img">
                        @if ($product->video_url)
                            <div class="video position-relative">
                                <video autoplay="" muted="" playsinline="" data-wf-ignore="true"
                                    data-object-fit="cover">
                                    <source src="{{ $product->video_url }}" data-wf-ignore="true" />
                                </video>
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



                            <div>
                                <span class="aui-list-product-item-price">
                                    {{ currency($product->selling_price, 'USD', session('currency')) }}
                                </span>
                                @if (count($product->prices) == 0)
                                    @if ($product->promotion)
                                        <span class="aui-list-product-item-del-price">
                                            {{ currency($product->price, 'USD', session('currency')) }}
                                        </span>
                                    @endif
                                @endif
                            </div>


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
    @if (request()->ajax())
        <section class="aui-list-product container-fluid" data-page="">
            <div class="aui-recommend py-3">
                <h2>{{ __('No more') }}</h2>
            </div>
        </section>
    @endif
@endif
