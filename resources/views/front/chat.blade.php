@extends('layouts.front')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .icon {
            padding: 10px;
            font-size: 30px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            color: #fff;
        }

        section a.link {
            vertical-align: 10px;
            font-size: 14px;
        }

    </style>
@endpush
@section('content')
    <div class="aui-content-box pt-0">
        <section class="p-1">
            @foreach ($chatmanagers as $chat)
            <div>
                <a href="{{ $chat->link }}">
                    <i class="icon {{ $chat->icon }}" @if( $chat->color) style="background:{{ $chat->color }}" @endif style="color:inherit"></i>
                </a>
                <a class="link" href="{{ $chat->link }}"> {{ $chat->link }} </a>
            </div>
            @endforeach
        </section>
    </div>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth
@endsection

@push('scripts')
    <script src="{{ asset('js/aui-cart.js') }}"></script>
@endpush
