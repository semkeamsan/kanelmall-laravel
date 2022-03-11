@extends('layouts.front')
@push('styles')
    <style>
        .internet{
            font-size: 30px;
        }
    </style>
@endpush
@section('content')
<div>
    <header class="aui-header-default aui-header-fixed">
        <a href="#back" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{ __('Internet') }}</div>
            </div>
        </div>
    </header>
    <section class="container py-6">
        <img class="w-100" src="{{ asset('images/internet.png') }}">
        <h1 class="text-center internet">{{ __('Online') }}</h1>
    </section>
</div>
@endsection
@push('scripts')
    <script>
        if(navigator.onLine){
            $(`.internet`).text(`{{ __('Online') }}`);
        }else{
            $(`.internet`).text(`{{ __('Offline') }}`);
        }
    </script>
@endpush
