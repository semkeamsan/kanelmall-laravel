@extends('layouts.front')
@section('content')
    <header class="aui-header-default aui-header-fixed aui-header-clear-bg " style="border-bottom:0">
        <a href="#back"  onclick="history.back()" class="aui-header-item d-none">
            <i class="aui-icon aui-icon-back-white" id="scrollSearchI" style="display:block"></i>
            <div id="scrollSearchDiv">
                <img src="{{ auth()->user()->avatar }}" alt="">
            </div>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="">

            </div>
        </div>
        <a href="{{ route('front.account.settings') }}" class="aui-header-item-icon">
            <i class="aui-icon aui-icon-sets"></i>
        </a>

    </header>
    <section class="aui-me-content py-0">
        <div class="aui-me-content-box">
            <div class="aui-me-content-list">
                <div class="aui-me-content-item">
                    <div class="aui-me-content-item-head">
                        <div class="aui-me-content-item-img">
                            <img src="{{ auth()->user()->avatar }}" alt="">
                        </div>
                        <div class="aui-me-content-item-title">
                            {{ auth()->user()->name }}
                            <br>
                            <small class="text-sm">{{ auth()->user()->email }}</small>
                            <br>
                            <small class="text-sm">{{ auth()->user()->phone }}</small>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if (in_array(auth()->user()->role_id, [1, 2, 3]))
            <section class="aui-grid-content">
                <a href="{{ route('admin.dashboard') }}">
                    <div class="aui-recommend p-2">
                        <div class="border border-primary py-1 text-primary">
                            <small>{{ __('Dashboard') }}</small>
                        </div>
                    </div>
                </a>
            </section>
        @endif
        <div class="aui-me-content-order">
            <a href="{{ route('front.account.myorder') }}" class="aui-well aui-fl-arrow">
                <div class="aui-well-bd">{{ __('My Orders') }}</div>
                <div class="aui-well-ft pr-4">{{ __('View All') }}</div>
            </a>
        </div>
        @include('front.account.action')
    </section>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth
@endsection
