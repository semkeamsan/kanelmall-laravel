@php
$categories = $categories->filter(function ($category) {
    if ($category->products) {
        return $category;
    }
});
@endphp


@foreach ($categories->take(3) as $category)
    <div class="aui-title-head">
        <h4 class="text-center text-white py-2">{{ $category->name }}</h4>
    </div>
    <div class="aui-list-item">
        <div class="aui-list-item-img">
            <img data-src={{ $category->image_url }} src="{{ asset('images/bg/log.png') }}">
        </div>
        <div class="aui-slide-box">
            <div class="aui-slide-list">
                <ul class="aui-slide-item-list">
                    @php
                        $category->products = collect($category->products);
                    @endphp
                    @foreach ($category->products->take(5) as $product)
                        <li class="aui-slide-item-item">
                            <div class="aui-top-action">
                                @if ($product->promotion)
                                    <div class="ribbon ribbon-top-right">
                                        <span> {{ $product->promotion->name }}</span>
                                    </div>
                                @endif
                                <a href="{{ route('front.cartadd', $product->id) }}"
                                    class="aui-top-action-item aui-add-cart {{ Cart::exists($product->id) ? 'd-none' : null }}"
                                    data-toggle="add-cart">
                                    <i class="fa fa-cart-plus text-white"></i>
                                </a>
                            </div>
                            <a href="{{ route('front.product', $product->id) }}" class="v-link">
                                <img class="v-img" data-src={{ $product->image_url }}
                                    src="{{ asset('images/bg/log.png') }}">
                                <p class="aui-slide-item-title aui-slide-item-f-els text-white">{{ $product->name }}
                                </p>
                                <p class="aui-slide-item-info">
                                    <span class="aui-slide-item-price text-white">
                                        {{ currency($product->selling_price, 'USD', session('currency')) }}
                                    </span>
                                    @if ($product->promotion)
                                        &nbsp;&nbsp;
                                        <span class="aui-slide-item-mrk">
                                            {{ currency($product->price, 'USD', session('currency')) }}
                                        </span>
                                    @endif
                                </p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endforeach
