@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-xl-12">
            {!! Form::open(['url' => route('admin.settings.socialite'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Social Login') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <span class="btn-inner--icon">
                                                <img class="avatar rounded-circle bg-transparent"
                                                    src="{{ asset('images/facebook.svg') }}">
                                            </span>
                                            <span class="btn-inner--text">
                                                {{ __('Facebook') }}
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox float-right">
                                                <input data-toggle="checkbox-show" data-target="#_facebook" type="checkbox"
                                                    class="custom-control-input" name="FACEBOOK_ENABLE" id="FACEBOOK_ENABLE"
                                                    {{ old('FACEBOOK_ENABLE',settings('FACEBOOK_ENABLE')) ? 'checked' : '' }} value="1">
                                                <label class="custom-control-label" for="FACEBOOK_ENABLE">
                                                    {{ __('Enable') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body {{ settings('FACEBOOK_ENABLE')??'d-none' }}" id="_facebook">
                                    <div class="form-row">
                                        <div class="col-xl-12 mb-3">
                                            {!! Form::label('FACEBOOK_APP_ID', __('Facebook app id'), ['class' => 'form-control-label']) !!}
                                            {!! Form::text('FACEBOOK_APP_ID', settings('FACEBOOK_APP_ID'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            {!! Form::label('FACEBOOK_APP_SECRET', __('Facebook app secret'), ['class' => 'form-control-label']) !!}
                                            {!! Form::text('FACEBOOK_APP_SECRET', settings('FACEBOOK_APP_SECRET'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            {!! Form::label('FACEBOOK_REDIRECT', __('Facebook redirect'), ['class' => 'form-control-label']) !!}
                                            {!! Form::text('FACEBOOK_REDIRECT', settings('FACEBOOK_REDIRECT'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col">
                                            <span class="btn-inner--icon">
                                                <img class="avatar rounded-circle bg-transparent"
                                                    src="{{ asset('images/google.svg') }}">
                                            </span>
                                            <span class="btn-inner--text">
                                                {{ __('Google') }}
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-checkbox float-right">
                                                <input data-toggle="checkbox-show" data-target="#_google" type="checkbox"
                                                    class="custom-control-input" name="GOOGLE_ENABLE" id="GOOGLE_ENABLE"
                                                    {{ old('GOOGLE_ENABLE',settings('GOOGLE_ENABLE')) ? 'checked' : '' }} value="1">
                                                <label class="custom-control-label" for="GOOGLE_ENABLE">
                                                    {{ __('Enable') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body {{ settings('GOOGLE_ENABLE')??'d-none' }}" id="_google">
                                    <div class="form-row">
                                        <div class="col-xl-12 mb-3">
                                            {!! Form::label('GOOGLE_APP_ID', __('Google app id'), ['class' => 'form-control-label']) !!}
                                            {!! Form::text('GOOGLE_APP_ID',  settings('GOOGLE_APP_ID'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            {!! Form::label('GOOGLE_APP_SECRET', __('Google app secret'), ['class' => 'form-control-label']) !!}
                                            {!! Form::text('GOOGLE_APP_SECRET',  settings('GOOGLE_APP_SECRET'), ['class' => 'form-control']) !!}
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            {!! Form::label('GOOGLE_REDIRECT', __('Google redirect'), ['class' => 'form-control-label']) !!}
                                            {!! Form::text('GOOGLE_REDIRECT',  settings('GOOGLE_REDIRECT'), ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Save Change'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xl-4">
            {!! Form::open(['url' => route('admin.settings.brandlogo'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Favicon') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-xl-12">
                            {!! Form::label('favicon', __('Favicon'), ['class' => 'form-control-label d-none']) !!}
                            {!! Form::hidden('favicon', old('favicon', settings('favicon',asset('images/default.png'))), ['class' => 'custom-file-input']) !!}
                            <a href="#" id="image" data-target-input="#favicon" data-target-image="#im-favicon">
                                <img src="{{ old('favicon', settings('favicon',asset('images/default.png'))) }}" id="im-favicon"
                                    class="img-center img-fluid shadow shadow-lg--hover bg-dark">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Save Change'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xl-4">
            {!! Form::open(['url' => route('admin.settings.brandlogo'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Frontend Logo') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-xl-12">
                            {!! Form::label('frontentlogo', __('Logo'), ['class' => 'form-control-label d-none']) !!}
                            {!! Form::hidden('frontentlogo', old('frontentlogo', settings('frontentlogo',asset('images/default.png'))), ['class' => 'custom-file-input']) !!}
                            <a href="#" id="image" data-target-input="#frontentlogo" data-target-image="#im-frontentlogo">
                                <img src="{{ old('frontentlogo', settings('frontentlogo',asset('images/default.png'))) }}" id="im-frontentlogo"
                                    class="img-center img-fluid shadow shadow-lg--hover bg-dark">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Save Change'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xl-4">
            {!! Form::open(['url' => route('admin.settings.brandlogo'), 'class' => 'needs-validation', 'novalidate' => true]) !!}
            <div class="card">
                <div class="card-header">
                    <h4 class="m-0">{{ __('Backend Logo') }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-xl-12">
                            {!! Form::label('backendlogo', __('Logo'), ['class' => 'form-control-label d-none']) !!}
                            {!! Form::hidden('backendlogo', old('backendlogo', settings('backendlogo',asset('images/default.png'))), ['class' => 'custom-file-input']) !!}
                            <a href="#" id="image" data-target-input="#backendlogo" data-target-image="#im-backendlogo">
                                <img src="{{ old('backendlogo', settings('backendlogo',asset('images/default.png'))) }}" id="im-backendlogo"
                                    class="img-center img-fluid shadow shadow-lg--hover bg-dark">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {!! Form::submit(__('Save Change'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@push('scripts-src')
    @filemanagerAssets
    @if (app()->getLocale() != 'en')
        @filemanagerScriptLang
    @endif
@endpush
@push('scripts')
    <script>
        var _token = $('meta[name="csrf-token"]').attr("content");
        $(`a#image`).filemanager({
            url: `filemanager`,
            _token: _token,
            multiple: false,
        });

        $(`[data-toggle="checkbox-show"]`).change(function() {
            var checked = $(this).prop('checked');
            var target = $(this).data('target');
            if(checked){
                $(target).removeClass('d-none');
            }else{
                $(target).addClass('d-none');
            }
        });
    </script>
@endpush
