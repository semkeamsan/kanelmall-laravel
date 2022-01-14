@if ($recommends->count())
    <div class="aui-recommend">
        <h2>{{ __('Recommends') }}</h2>
    </div>
    <section class="aui-list-product">
        <div class="aui-list-product-box px-3">
            <div class="row">
                @foreach ($products as $product)
                    <a href="{{ route('front.product', $product->{env('WHERE_BY', 'id')}) }}"
                        class="col-xl-6 aui-list-product-item">
                        <div class="aui-list-product-item-img">
                            @if ($product->media->count())
                                @switch( $product->media->first()['extension'])
                                    @case('image')
                                        <img src="{{ $product->media->first()['path'] }}">
                                    @break
                                    @case('video')
                                        <div class="video position-relative">
                                            <video autoplay muted src="{{ $product->media->first()['path'] }}"></video>
                                            <div class="bottom-2 position-absolute right-2" data-toggle="muted">
                                                <i class="fa fa-2x fa-volume-mute"></i>
                                            </div>
                                        </div>
                                    @break
                                    @default
                                @endswitch

                            @else
                                <img src="{{ $product->feature }}">
                            @endif

                        </div>
                        <div class="aui-list-product-item-text">
                            <h3> {{ $product->translation->name }} </h3>
                            <div class="aui-list-product-mes-box">
                                <div>
                                    <span class="aui-list-product-item-price">
                                        {{ currency($product->selling_price, 'USD',session('currency')) }}
                                    </span>
                                    <span class="aui-list-product-item-del-price">
                                        {{ currency($product->price, 'USD',session('currency')) }}
                                    </span>
                                </div>
                                <div class="aui-comment">{{ $product->view }} {{ __('View') }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <section class="aui-grid-content">
        <div class="aui-recommend p-2">
            <div class="border border-primary py-1 text-primary">
                <a href="{{ route('front.home') }}">
                    <small>{{ __('More') }}</small>
                </a>
            </div>
        </div>
    </section>

@endif
