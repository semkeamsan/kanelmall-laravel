@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.order.create')
                    @include('admin.order.templates.form.create')
                @else
                    @include('admin.order.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @filemanagerAssets
    <script>
        var _token = $('meta[name="csrf-token"]').attr("content");
        $(`#fimage`).filemanager({
            url: `{{ env('FILEMANAGER_URL') }}`,
            _token: _token,
            multiple: false,
        });
    </script>
@endpush
