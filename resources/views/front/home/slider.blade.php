<div class="aui-banner-content">
    <div class="owl-carousel owl-theme">
        @foreach ($sliders as $slider)
            <div class="aui-banner-wrapper-item">
                <img data-src={{ $slider->image }} src="{{ asset('images/bg/log.png') }}">
            </div>
        @endforeach
    </div>
</div>
