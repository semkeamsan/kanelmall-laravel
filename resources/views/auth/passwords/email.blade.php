@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-xl-7 row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Reset Password') }}</h3>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
                            @csrf

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}
                                    / {{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="text" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="phone" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @else
                                        <div class="invalid-feedback">
                                            {{ __('validation.required', ['attribute' => __('Phone Number')]) }}
                                        </div>
                                    @enderror --}}

                                    <div class="input-group">
                                        <div class="input-group-prepend d-none" id="icon-mail">
                                            <span class="input-group-text">
                                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="input-group-prepend" id="icon-phone">
                                            <span class="input-group-text px-2 py-0">
                                                +855
                                            </span>
                                        </div>
                                        <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                            name="email" placeholder="" value="{{ old('email') }}" required
                                            autocomplete="phone" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @else
                                            <div class="invalid-feedback">
                                                {{ __('validation.required', ['attribute' => __('Phone Number')]) }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            @if (env('FIREBASE_OTP'))
                                <div id="reset-pass" class="d-none">
                                    <div class="form-group row mb-3">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="password" id="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    value="{{ old('password') }}" name="password" autocomplete="password">

                                                <div class="input-group-append" data-toggle="sh-password"
                                                    data-target="#password">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-eye" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">
                                                        {{ __('validation.required', ['attribute' => __('Password')]) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label for="password_confirmation"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                        <div class="col-md-6">

                                            <div class="input-group">
                                                <input type="password" id="password_confirmation"
                                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                    value="{{ old('password_confirmation') }}"
                                                    name="password_confirmation" autocomplete="new-password">

                                                <div class="input-group-append" data-toggle="sh-password"
                                                    data-target="#password_confirmation">
                                                    <span class="input-group-text">
                                                        <i class="fal fa-eye" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @else
                                                    <div class="invalid-feedback">
                                                        {{ __('validation.required', ['attribute' => __('Confirm Password')]) }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary d-none">
                                        {{ __('Send code') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="recaptcha-container"></div>
@endsection

@push('scripts')
    <script>
        var $ajax;
        $(`[name="email"]`).on('input', function() {
            var val = $(this).val();
            $(this).parents('form').find('button').addClass('d-none');
            if (val) {

                var filter =
                    /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                if (filter.test(val)) {
                    $(this).parents('form').attr('action', `{{ route('password.reset.phone') }}`);
                    $(this).parents('form').attr('method', 'get');
                    $(this).attr('name', 'phone');
                    $(this).parents('form').find('button').text(`{{ __('Send Code') }}`);
                } else {
                    $(this).parents('form').attr('action', `{{ route('password.email') }}`);
                    $(this).parents('form').attr('method', 'post');
                    $(this).attr('name', 'email');
                    $(this).parents('form').find('button').text(`{{ __('Send Password Reset Link') }}`);
                }
                if ($ajax) {
                    $ajax.abort();
                }
                $ajax = $.get(`{{ route('ck.user.username', '') }}/${val}`).done(res => {
                    if (res) {
                        $(this).parents('form').find('button').removeClass('d-none');
                    }
                });
            }
        });
    </script>
@endpush
@if (env('FIREBASE_OTP'))
    @push('scripts')
        <script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>
        <script>
            let confirmation = null;
            const firebaseConfig = {
                apiKey: `{{ env('FIREBASE_APIKEY') }}`,
                authDomain: `{{ env('FIREBASE_AUTHDOMAIN') }}`,
                projectId: `{{ env('FIREBASE_PROJECTID') }}`,
                storageBucket: `{{ env('FIREBASE_STORAGE') }}`,
                messagingSenderId: `{{ env('FIREBASE_MESSAGERSENDERID') }}`,
                appId: `{{ env('FIREBASE_APPID') }}`,
                measurementId: `{{ env('FIREBASE_MEASUREMENTID') }}`,
            };
            firebase.initializeApp(firebaseConfig);
            firebase.auth().languageCode = `{{ app()->getLocale() }}`;
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
                size: 'invisible'
            });

            function otp(form) {
                var $modal = $(`<div id="filemanager-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header pb-0 border-bottom">
                                                <h4>{{ __('Enter the 6 digit code we sent you via phone number to continue') }}</h4>
                                            </div>
                                            <div class="modal-body p-0 p-xl-3">
                                                <div class="input-group otp">
                                                    <input class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline" type="number" id="first" maxlength="1" />
                                                    <input class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline" type="number" id="second" maxlength="1" />
                                                    <input class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline" type="number" id="third" maxlength="1" />
                                                    <input class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline" type="number" id="fourth" maxlength="1" />
                                                    <input class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline" type="number" id="fifth" maxlength="1" />
                                                    <input class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline" type="number" id="sixth" maxlength="1" />
                                                </div>
                                            </div>
                                            <div class="modal-footer pt-0">
                                                <button class="btn btn-primary" id="submit">{{ __('Ok') }}</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>`);
                $modal.find(`button`).click((e) => {
                    e.preventDefault();
                    var code = '';
                    $modal.find('.otp > *[id]').each(function() {
                        code += $(this).val();
                    });
                    confirmation.confirm(code)
                        .then(function(result) {
                            $modal.modal('hide');

                            var $form = $(form);
                            $form.attr('action', `{{ route('password.reset.phone') }}`);
                            $form.removeClass('was-validated');
                            $form.find(`[name="email"]`).attr('name', 'phone');
                            $form.find(`[type="password"]`).attr('required', true);
                            $form.append(`<input type="hidden" name="code" value="${code}">`);
                            $form.attr('method', 'post');
                            $form.find(`#reset-pass`).removeClass('d-none');
                            $form.find(`button`).text(`{{ __('Reset Password ') }}`);

                        }).catch(function(error) {
                            console.log(error.message)
                            $modal.find('.has-error').remove();
                            $modal.find(`.otp`).after(
                                `<div class="has-error text-danger">${error.message}</div>`
                            );

                        });
                });
                Kanel.otp($modal.find('.otp > *[id]'));
                $modal.modal('show');
            }
            $(`form.needs-validation`).submit(function(ev) {
                ev.preventDefault();
                var form = this;
                if (this.checkValidity()) {
                    var username = $(this).find(`[name="phone"]`).val();
                    var filter =
                        /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                    if (filter.test(username)) {
                        if (confirmation) {
                            if ($(form).find(`[name="code"]`).val()) {
                                var $form = $(form).clone();
                                $form.addClass('d-none');
                                $form.appendTo('body');
                                $form.submit();
                            } else {
                                otp(form);
                            }

                        } else {
                            firebase.auth().signInWithPhoneNumber(`+855${username}`, window.recaptchaVerifier)
                                .then(confirmationResult => {
                                    confirmation = confirmationResult;
                                    otp(form);
                                }).catch(error => console.log(error));
                        }

                    } else {
                        var $form = $(form).clone();
                        $form.addClass('d-none');
                        $form.appendTo('body');
                        $form.submit();
                    }
                }
            });
        </script>

    @endpush
@endif
