@extends('layouts.front')
@section('content')
    @include('front.navbar.header')
    @include('front.home.slider')
    <div class="aui-content-box">
        {{-- @include('front.home.promotion')
        @include('front.home.category') --}}
        @include('front.home.product')
    </div>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth
@endsection
