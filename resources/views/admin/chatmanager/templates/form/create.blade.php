{!! Form::open([
    'url' => route('admin.chatmanager.store'),
    'class' => 'needs-validation',
    'novalidate' => true,
]) !!}
<div class="card">
    <div class="card-header">
        <h3 class="mb-0">{{ __('Add') }}</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-3 mb-3">
                @include('admin.chatmanager.templates.form.tab')
            </div>
            <div class="col-xl-9 mb-3">
                <div class="tab-content">
                    <div id="general" class="tab-pane fade show active">
                        <div class="card border m-0 shadow-none">
                            <div class="card-header">
                                <h3 class="mb-0">{{ __('General') }}</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group form-row">
                                    <label for="name" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Name') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
                                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}

                                        @error('name')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Name')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <label for="link" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Link') }}
                                        <span class="text-danger text-xs"> * </span>
                                    </label>
                                    <div class="col-xl-6">
                                        {!! Form::text('link', null, ['class' => 'form-control', 'required' => true]) !!}

                                        @error('link')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Name')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <label for="icon" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Icon') }}
                                    </label>
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            {!! Form::text('icon', null, ['class' => 'form-control']) !!}
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fal fa-icons"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('icon')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Icon')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-row">
                                    <label for="color" class="col-xl-3 col-form-label form-control-label">
                                        {{ __('Color') }}
                                    </label>
                                    <div class="col-md-6 mb-3">
                                        {!! Form::color('color', null, ['class' => 'form-control']) !!}
                                        @error('color')
                                            <div class="error-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Color')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn" href="{{ route('admin.chatmanager.index') }}">{{ __('Back') }}</a>
        <div class="float-right ">
            <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
