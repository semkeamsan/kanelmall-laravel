@extends('layouts.front')
@push('styles')
    <style>
        .tab-panel {
            background: transparent;
        }

        .tab-panel-item>ul {
            display: grid;
        }

        .tab-nav-item.tab-active:before {
            height: 0;
        }

        .tab-nav-item.tab-active {
            background: var(--color-primary);
        }

        .tab-nav-item.tab-active>a {
            color: #fff;
        }


        iframe {
            width: 100%;
            height: 160px;
        }

    </style>
@endpush
@section('content')
    <livewire:front.order/>
@endsection


