<div id="livewire">
    <header class="aui-header-default aui-header-fixed">
        <a href="{{ route('front.account.settings') }}" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{ __('Personal information') }}</div>
            </div>
        </div>
        <a href="#" class="aui-header-item-icon position-absolute right-0"
            data-ydui-actionsheet="{target:'#action-languages',closeElement:'#cancel'}">
            <img width="26" src="{{ asset('images/flags/' . app()->getLocale() . '.svg') }}" />
        </a>
    </header>
    <div class="m-actionsheet" id="action-languages">
        <div style="position:relative">
            <div class="p-3 border-bottom text-left">
                <h4>{{ __('Languages') }}</h4>
            </div>
            <div class="aui-product-text-content h-100">
                @foreach (config('laravellocalization.supportedLocales', []) as $key => $lang)
                    <div class="aui-product-text-content-list">
                        <div class="aui-product-text-content-list-ft">
                            <a class="border-0 d-flex {{ $key == app()->getLocale() ? 'active' : null }}"
                                href="{{ LaravelLocalization::getLocalizedURL($key) }}">
                                <span>
                                    <img width="26" src="{{ asset('images/flags/' . $key . '.svg') }}" />
                                </span>
                                <span class="px-2">{{ $lang['native'] }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="#" class="actionsheet-action" id="cancel"></a>
        </div>
    </div>
    {!! Form::open([
    'url' => route('front.account.personal'),
    'class' => 'needs-validation',
    'novalidate' => true,
    'wire:submit.prevent' => 'update',
]) !!}

    <section class="container py-6">
        @if ($response)
        <div class="alert alert-{{ $response['type'] }} alert-dismissible fade show" role="alert">
            <strong>
                @if ($response['type'] == 'success')
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                @else
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                @endif
            </strong>
            {{ $response['message'] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        <div class="row">
            <div class="col-xl-8">
                <div class="form-row mb-2">
                    <div class="col-8">
                        <label for="name" class="form-control-label">{{ __('Name') }}</label>
                        @if (collect($rules)->get('name'))
                            <span class="text-danger text-xs">*</span>
                        @endif
                        <input type="text" class="form-control" wire:model="name"
                            {{ collect($rules)->get('name') ? 'required' : null }}>
                        @error('name')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="name" class="form-control-label">{{ __('Gender') }}</label>
                        @if (collect($rules)->get('gender'))
                            <span class="text-danger text-xs">*</span>
                        @endif
                        <select class="form-control" wire:model="gender"
                            {{ collect($rules)->get('name') ? 'required' : null }}>
                            <option value="male">{{ __('Male') }}</option>
                            <option value="female">{{ __('Female') }}</option>
                        </select>
                        @error('gender')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="mb-2">
                    <label for="name" class="form-control-label">{{ __('Date of Birth') }}</label>
                    @if (collect($rules)->get('dob'))
                        <span class="text-danger text-xs">*</span>
                    @endif
                    <input type="text" class="form-control datepicker" wire:model="dob"
                        {{ collect($rules)->get('dob') ? 'required' : null }}>
                    @error('dob')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label for="name" class="form-control-label">{{ __('About me') }}</label>
                    @if (collect($rules)->get('about'))
                        <span class="text-danger text-xs">*</span>
                    @endif
                    <textarea class="form-control" cols="30" rows="3" wire:model="about"></textarea>
                    @error('about')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @else
                        <div class="invalid-feedback">
                            {{ __('validation.required', ['attribute' => __('About')]) }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-xl-4">
                <input type="file" id="avatar" class="custom-file-input d-none" wire:model="avatar">
                <label class="btn btn-secondary mb-3" for="avatar">
                    <i class="fal fa-folder-open"></i>
                    {{ __('Browse') }}
                </label>
                @if ($avatar)
                    <div class="col p-3 border">
                        <div class="avatar rounded bg-transparent w-100 h-100">
                            @if (gettype($avatar) == 'string')
                                <img class="w-100" src="{{ $avatar }}">
                            @else
                                <img class="w-100" src="{{ $avatar->temporaryUrl() }}">
                            @endif
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </section>
    <footer class="aui-footer-product">
        <div class="aui-footer-button-fixed">
            <div class="aui-footer-product-action-list float-right">
                <button type="submit" class="red-color w-100">{{ __('Update') }}</button>
            </div>
        </div>
    </footer>
    {!! Form::close() !!}
    <div wire:loading wire:target="update">
        <div class="swal2-container swal2-center swal2-fade swal2-shown"
            class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
            <div class="swal2-header">
                <h2 class="swal2-title text-primary" id="swal2-title">
                    {{ __('Updating') }}
                </h2>
            </div>
            <div class="swal2-actions swal2-loading" style="display: flex;">
                <div class="swal2-confirm swal2-styled"
                    style="border-left-color: var(--primary); border-right-color: var(--primary); display: flex;">
                </div>
            </div>
        </div>
    </div>
    <div wire:loading wire:target="avatar">
        <div class="swal2-container swal2-center swal2-fade swal2-shown"
            class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
            <div class="swal2-header">
                <h2 class="swal2-title text-primary" id="swal2-title">
                    {{ __('Uploading') }}
                </h2>
            </div>
            <div class="swal2-actions swal2-loading" style="display: flex;">
                <div class="swal2-confirm swal2-styled"
                    style="border-left-color: var(--primary); border-right-color: var(--primary); display: flex;">
                </div>
            </div>
        </div>
    </div>
</div>

