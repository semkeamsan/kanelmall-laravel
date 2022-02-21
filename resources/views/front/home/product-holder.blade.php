<section class="aui-list-product product-holder">
    @for ($i = 0; $i < 100; $i++)
        <div class="aui-list-product-item col-6">
            <a href="#">
                <div class="aui-list-product-item-img">
                    <img src="{{ asset('images/bg/log.jpg') }}" draggable="false">
                </div>
                <div class="aui-list-product-item-text">
                    <h3> </h3>
                    <div class="aui-list-product-mes-box">
                        <div>
                            <span class="aui-list-product-item-price">
                                {{ currency(0.00, 'USD', session('currency')) }}
                            </span>
                            <span class="aui-list-product-item-del-price">
                                {{ currency(0.00, 'USD', session('currency')) }}
                            </span>
                        </div>
                        <div class="aui-comment"><i class="fa fa-check"></i> {{ __('Instock') }}</div>
                    </div>
                </div>
            </a>
        </div>
    @endfor
</section>
