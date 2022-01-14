@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                @if (Route::currentRouteName() == 'admin.chatmanager.create')
                    @include('admin.chatmanager.templates.form.create')
                @else
                    @include('admin.chatmanager.templates.form.edit')
                @endif

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(`[name="icon"]`).on('input', function() {
            var val = $(this).val();
            if (val) {
                $(this).parent().find(`.input-group-append i`).removeClass().addClass(val);
            } else {
                $(this).parent().find(`.input-group-append i`).removeClass().addClass('fal fa-icons');
            }
        });
        $(`[name="color"]`).on('input', function() {
            var val = $(this).val();
            $(`[name="icon"]`).parent().find(`.input-group-append i`).css({color : val});
        });
    </script>
@endpush
