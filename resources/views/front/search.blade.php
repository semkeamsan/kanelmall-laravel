@extends('layouts.front')
@section('content')
    @include('front.navbar.header')
    <div class="aui-content-box pt-5">
        @if ($products->count())
            @include('front.home.product')
        @else
            <section class="" data-page="">
                <div class="aui-recommend py-3">
                    <h4>{{ __('No results') }} : <small>{{ request('q') }}</small></h4>
                </div>
            </section>
        @endif
    </div>
    @include('front.navbar.footer')
@endsection
