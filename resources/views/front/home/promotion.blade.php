@if ($promotions->count())
    <div class="aui-title-head">
        <h4 class="text-center text-white py-2">{{ __('Promotions') }}</h4>
    </div>
    <div class="aui-slide-box aui-slide-box-clear border-bottom">
        <div class="aui-slide-list">
            <ul class="aui-slide-item-list">
                @foreach ($promotions as $promotion)
                    <li class="aui-slide-item-item">
                        <a href="{{ route('front.categoryby', $promotion->category_id) }}" class="v-link">
                            <img class="v-img" data-src={{ $promotion->image_url }} src="{{ asset('images/bg/log.png') }}">
                            <p class="aui-grid-row-label text-truncate">{{ $promotion->name }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@foreach ($promotions->take(3) as $promotion)
    <div class="aui-list-item border-bottom">
        <div class="aui-list-item-img">
            <img data-src={{ $promotion->image_url }} src="{{ asset('images/bg/log.png') }}">
        </div>
        <div class="aui-slide-box">
            <div class="aui-slide-list">
                <ul class="aui-slide-item-list">
                    @foreach ($promotion->products->take(5) as $product)
                        <li class="aui-slide-item-item">
                            <div class="aui-top-action">
                                <a href="{{ route('front.cartadd',$product->id) }}" class="aui-top-action-item aui-add-cart {{ Cart::exists($product->id) ? 'd-none' : null }}" data-toggle="add-cart">
                                    <i class="fa fa-cart-plus text-white"></i>
                                </a>
                            </div>
                            <a href="{{ route('front.product', $product->id) }}" class="v-link">
                                <img class="v-img"  data-src={{ $product->image_url }} src="{{ asset('images/bg/log.png') }}">
                                <p class="aui-slide-item-title aui-slide-item-f-els text-white">{{ $product->name }}
                                </p>
                                <p class="aui-slide-item-info">
                                    <span class="aui-slide-item-price text-white">
                                        {{ currency($product->selling_price, 'USD',session('currency')) }}
                                    </span>
                                    &nbsp;&nbsp;
                                    <span class="aui-slide-item-mrk">
                                        {{ currency($product->price, 'USD',session('currency')) }}
                                    </span>
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endforeach
