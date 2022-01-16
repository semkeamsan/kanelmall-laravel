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
@push('styles')
    <style>
        .svg-loader {
            display: flex;
            width: 100%;
            padding : 20px;
            align-content: space-around;
            justify-content: center;
        }

        .loader-svg {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            fill: none;
            stroke-width: 5px;
            stroke-linecap: round;
            stroke: var(--primary);
        }

        .loader-svg.bg {
            stroke-width: 8px;
            stroke: #fff;
        }

        .animate {
            stroke-dasharray: 242.6;
            animation: fill-animation 1s cubic-bezier(1, 1, 1, 1) 0s infinite;
        }

        @keyframes fill-animation {
            0% {
                stroke-dasharray: 40 242.6;
                stroke-dashoffset: 282.6;
            }

            50% {
                stroke-dasharray: 141.3;
                stroke-dashoffset: 141.3;
            }
            100% {
                stroke-dasharray: 40 242.6;
                stroke-dashoffset: 0;
            }


        }

    </style>
@endpush
 