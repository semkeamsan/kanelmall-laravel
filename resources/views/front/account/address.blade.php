@extends('layouts.front')
@push('styles')
    <style>
        iframe{
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <livewire:front.account.address/>
@endsection
