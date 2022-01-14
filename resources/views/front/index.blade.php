@extends('layouts.front')
@section('content')
    <style>
        .svg-loader {
            display: flex;
            position: relative;
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
            stroke: rgb(207, 205, 245);
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
    <div class="h-100 bg">
        <img src="{{ asset('images/bg/log.png') }}" class="w-100">
        <h2 class="text-center text-white mb-3">{{ __('Welcome to') }} {{ env('APP_NAME') }}</h2>
        <div class="svg-loader">
            <svg class="svg-container" height="100" width="100" viewBox="0 0 100 100">
                <circle class="loader-svg bg" cx="50" cy="50" r="45"></circle>
                <circle class="loader-svg animate" cx="50" cy="50" r="45"></circle>
            </svg>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var x = setInterval(() => {
            if (window.init) {
                location.href = `{{ route('front.home') }}`;
                clearInterval(x);
            }
        });
    </script>
@endpush
