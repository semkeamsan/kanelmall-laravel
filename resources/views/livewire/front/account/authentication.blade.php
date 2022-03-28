<div>
    <header class="aui-header-default aui-header-fixed">
        <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(),route('front.account.settings')) }}" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{ __('Authentication') }}</div>
            </div>
        </div>
    </header>


    <section class="container py-6   ">
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
            <div class="col-xl-12">
                <div class="mb-2">
                    <label for="email" class="form-control-label">{{ __('Email') }}</label>
                    @if (collect($rules)->get('email'))
                        <span class="text-danger text-xs">*</span>
                    @endif

                    <div class="input-group">
                        <input type="text" class="form-control" wire:model="email"
                            {{ collect($rules)->get('email') ? 'required' : null }}>

                        @if (auth()->user()->email_verified_at)
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fal fa-check text-green" aria-hidden="true"></i>
                                </span>
                            </div>
                        @else
                            <div class="input-group-append">
                                <span class="input-group-text input-group-text px-3 py-0">
                                    <a href="{{ route('verification.notice') }}" class="btn-link text-sm"
                                        target="_blank">
                                        {{ __('Verify') }}
                                    </a>
                                </span>
                            </div>
                        @endif

                        @error('email')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">
                    <label for="phone" class="form-control-label">{{ __('Phone Number') }}</label>
                    @if (collect($rules)->get('phone'))
                        <span class="text-danger text-xs">*</span>
                    @endif

                    <div class="input-group">
                        <input type="text" class="form-control" wire:model="phone"
                            {{ collect($rules)->get('phone') ? 'required' : null }}>

                        @if (auth()->user()->phone_verified_at)
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fal fa-check text-green" aria-hidden="true"></i>
                                </span>
                            </div>
                        @else
                            <div class="input-group-append">
                                <span class="input-group-text input-group-text px-3 py-0">
                                    <a href="{{ route('verification.notice') }}" class="btn-link text-sm"
                                        target="_blank">
                                        {{ __('Verify') }}
                                    </a>
                                </span>
                            </div>
                        @endif
                        @error('phone')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-2">

                    <label for="password" class="form-control-label">{{ __('New password') }}</label>
                    @if (collect($rules)->get('password'))
                        <span class="text-danger text-xs">*</span>
                    @endif
                    <input type="password" class="form-control" wire:model="password"
                        {{ collect($rules)->get('password') ? 'required' : null }}>
                    @error('password')
                        <div class="error-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

        </div>
        @if ($auths->count())
            <div class="row">
                <div class="col">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th>{{ __('Provider') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($auths as $key => $auth)
                                <tr>
                                    <td>
                                        <img class="avatar rounded-circle bg-transparent"
                                            src="{{ asset('images/' . $auth->provider . '.svg') }}">
                                    </td>
                                    <td>
                                        <div class="media align-items-center">
                                            <a href="#" target="_blank" class="border avatar bg-transparent mr-3">
                                                <img src="{{ $auth->_avatar }}">
                                            </a>
                                            <div class="media-body">
                                                @if ($auth->_name)
                                                    <span class="mb-0 text-sm">{{ $auth->_name }}</span>
                                                    <br>
                                                @endif
                                                @if ($auth->_email)
                                                    <span class="mb-0 text-sm">{{ $auth->_email }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-danger"
                                            wire:click="authremove({{ $key }})">
                                            <i class="fal fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </section>
    <footer class="aui-footer-product">
        <div class="aui-footer-button-fixed">
            <div class="aui-footer-product-action-list float-right">
                <button type="submit" class="red-color w-100" wire:click="update">{{ __('Update') }}</button>
            </div>
        </div>
    </footer>
    <div wire:loading wire:target="update">
        <div class="swal2-container swal2-center swal2-fade swal2-shown"
            class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
            <div class="swal2-header">
                <h2 class="swal2-title text-white" id="swal2-title">
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
</div>
