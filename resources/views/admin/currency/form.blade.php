@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.currency.create')
                    @include('admin.currency.templates.form.create')
                @else
                    @include('admin.currency.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
