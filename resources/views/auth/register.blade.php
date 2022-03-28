@extends('layouts.app')
@push('styles')
<style>
    section {
        position: absolute;
        width: 100%;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endpush
@section('content')
    <div id="fb-root"></div>
    <!--register -->
    <section class="py-xl-7 register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="py-3 {{ request()->is('*register') ? 'col-xl-8 ' : 'col-xl-12' }}">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-xl-6">

                                        <div class="section-title text-center">
                                            <h2>{{ __('Register with') }}</h2>
                                            @error('status')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>


                                    <form class="form-row align-items-center needs-validation d-none" method="POST" novalidate
                                        action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Name') }}:</label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                name="name" placeholder="" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @else
                                                <div class="invalid-feedback">
                                                    {{ __('validation.required', ['attribute' => __('Name')]) }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Email Address') }} / {{ __('Phone Number') }}:</label>
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
                                                <input type="text"
                                                    class="form-control  @error('email') is-invalid @enderror" name="email"
                                                    placeholder="" value="{{ old('email') }}" required
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
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Password') }}:</label>
                                            <div class="input-group">
                                                <input type="password" id="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    value="{{ old('password') }}" name="password" autocomplete="password"
                                                    required>

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
                                        <div class="mb-3 col-sm-12">
                                            <label>{{ __('Confirm Password') }}:</label>
                                            <div class="input-group">
                                                <input type="password" id="password_confirmation"
                                                    class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                    value="{{ old('password_confirmation') }}"
                                                    name="password_confirmation" autocomplete="new-password" required>

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
                                        <div class="col-sm-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-block">{{ __('Register') }}</button>
                                        </div>
                                    </form>
                                    <div class="mt-4">
                                        <div class="text-muted text-center m-2 d-none">
                                            <span>{{ __('Register with') }}</span>
                                        </div>
                                        <div class="btn-wrapper text-center">
                                            {{-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" class="d-xl-none d-sm-block"></fb:login-button> --}}
                                            <a href="{{ route('otp.with', 'phone') }}"
                                                class="btn btn-neutral btn-icon mb-2">
                                                <span class="btn-inner--icon"><i class="fa fa-phone"></i></span>
                                                <span class="btn-inner--text">{{ __('Phone') }}</span>
                                            </a>
                                            <a href="{{ route('auth.with', 'facebook') }}"
                                                class="btn btn-neutral btn-icon mb-2">
                                                <span class="btn-inner--icon"><img
                                                        src="{{ asset('images/facebook.svg') }}"></span>
                                                <span class="btn-inner--text">{{ __('Facebook') }}</span>
                                            </a>
                                            <a href="{{ route('auth.with', 'google') }}"
                                                class="btn btn-neutral btn-icon mb-2">
                                                <span class="btn-inner--icon"><img
                                                        src="{{ asset('images/google.svg') }}"></span>
                                                <span class="btn-inner--text">{{ __('Google') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="{{ asset('images/logo.jpg') }}" class="w-100">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--register -->
    <div id="recaptcha-container"></div>
@endsection
@push('scripts')
    <script>
        function checkLoginState() {
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }
        window.fbAsyncInit = function() {
            FB.init({
                appId: `{{ env('FACEBOOK_APP_ID') }}`,
                cookie: true, // Enable cookies to allow the server to access the session.
                xfbml: true, // Parse social plugins on this webpage.
                version: 'v12.0' // Use this Graph API version for this call.
            });

            FB.getLoginStatus(function(response) { // Called after the JS SDK has been initialized.
                if (response.status === 'connected') {
                    FB.api(`me?fields=id,first_name,last_name,gender`, function(response) {
                        $(`#loginfb`).find(`.btn-inner--text`).text(
                            `{{ __('Continue as') }} ${response.first_name} ${response.last_name}`
                            );
                    });
                }
                //statusChangeCallback(response); // Returns the login status.
            });
        };

        function statusChangeCallback(response) {
            if (response.status === 'connected') {
                FB.api(`me?fields=id,first_name,last_name,gender,birthday,email,friends,picture.width(100).height(100).as(picture_small),picture.width(720).height(720).as(picture_large)`,
                    function(response) {
                        var data = {
                            _token: $(`[name="csrf-token"]`).attr(`content`),
                            id: response.id,
                            name: `${response.first_name} ${response.last_name}`,
                            email: response.email,
                            avatar: response.picture_large.data.url,
                        };
                        $.post(`{{ route('auth.with.data', 'facebook') }}`, data).done((res) => {
                            if (res) {
                                location.href = `{{ route('front.account.index') }}`;
                            }
                        });
                    });

            }
        }
    </script>
    <!-- Load the JS SDK asynchronously -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
@endpush

{{-- @push('scripts')
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
                                            <div class="modal-body">
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
                        var $form = $(form).clone();
                        $form.find(`#recaptcha-container`).remove();
                        $form.addClass('d-none');
                        $form.appendTo('body');
                        $form.submit();
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
                var username = $(this).find(`[name="email"]`).val();
                var filter =
                    /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
                if (filter.test(username)) {

                    if (confirmation) {
                        otp(form);
                    } else {
                        firebase.auth().signInWithPhoneNumber(`+855${username}`, window.recaptchaVerifier)
                            .then(confirmationResult => {
                                confirmation = confirmationResult;
                                otp(form);
                            }).catch(error => console.log(error));
                    }


                } else {
                    var $form = $(form).clone();
                    $form.find(`#recaptcha-container`).remove();
                    $form.addClass('d-none');
                    $form.appendTo('body');
                    $form.submit();
                }
            }
        });
    </script>
@endpush --}}
