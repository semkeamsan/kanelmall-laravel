@extends('layouts.app')
@section('content')
    <section class="py-xl-7 verify">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="needs-validation" method="POST" action="{{ route('otp.with.callback', 'phone') }}"
                        novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="m-0">{{ __('OTP with phone number') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <input type="number" name="phone" id="phone" class="form-control" required
                                        placeholder="{{ __('Phone Number') }}">

                                </div>
                                <div class="w-100 mb-3" id="send">
                                    <button type="button" class="btn d-block w-100 btn-primary" onclick="sendcode(event)">
                                        {{ __('Send code') }}
                                    </button>
                                </div>
                                <div class="form-group mb-3 d-none" id="code">
                                    <h4>
                                        {{ __('Enter the 6 digit code we sent you via phone number to continue') }}
                                    </h4>
                                    <input class="form-control" id="code" name="code" type="number" maxlength="6" min="6"
                                        max="6" required />
                                </div>
                                <div class="w-100 d-none" id="confirm">
                                    <button type="button" class="btn d-block w-100 btn-primary"
                                        onclick="confirmcode(event)">
                                        {{ __('Confirm') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="d-none" id="resendcode">
                        {{ __('Before proceeding, please check your phone number for a verification code.') }}
                        {{ __('If you did not receive the code') }},
                        <button onclick="sendcode(event)"
                            class="btn btn-sm btn-link">{{ __('click here to request another.') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="recaptcha-container"></div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    <style>
        .iti {
            width: 100%;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
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
        //firebase.auth().languageCode = `{{ app()->getLocale() }}`;
        firebase.auth().useDeviceLanguage();
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            size: 'invisible'
        });

        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            initialCountry: "auto",
            geoIpLookup: function(success) {
                success('KH')
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        var $loading = $(
            `<div class="swal2-container swal2-center swal2-fade swal2-shown"
                class="swal2-popup swal2-toast swal2-show swal2-loading" style="display: flex;">
                <div class="swal2-header">
                    <h2 class="swal2-title text-white" id="swal2-title">
                        ${window.languages.Processing??'Processing'}...
                    </h2>
                </div>
                <div class="swal2-actions swal2-loading" style="display: flex;">
                    <div class="swal2-confirm swal2-styled"
                        style="border-left-color: var(--primary); border-right-color: var(--primary); display: flex;">
                    </div>
                </div>
            </div>`
        );
        function sendcode(event) {
            $loading.appendTo('body');
            event.preventDefault();
            var $form = $(event.target).parents(`form`);
            var phoneNumber = phoneInputField.value;
            if (phoneInput.getValidationError()) {
                var message = null;
                switch (phoneInput.getValidationError()) {
                    case intlTelInputUtils.validationError.INVALID_COUNTRY_CODE:
                        message = `{{ __('The country code is not valid') }}`;
                        break;

                    case intlTelInputUtils.validationError.TOO_SHORT:
                        message = `{{ __('The phone number is too short') }}`;
                        break;

                    case intlTelInputUtils.validationError.TOO_LONG:
                        message = `{{ __('The phone number is too long') }}`;
                        break;

                    case intlTelInputUtils.validationError.NOT_A_NUMBER:
                        message = `{{ __('The value is not a number') }}`;
                        break;

                    default:
                        message = `{{ __('The phone number is not valid') }}`;
                        break;
                }
                $form.find('.error-phone').remove();
                $(`[name="phone"]`).parents(`.form-group`).append(
                    `<div class="invalid-feedback d-block error error-phone">${message}</div>`
                );
                $loading.remove();
            } else {
                var fullPhoneNumber = phoneInput.getNumber(intlTelInputUtils.numberFormat.E164);
                firebase.auth().signInWithPhoneNumber(fullPhoneNumber, window.recaptchaVerifier)
                    .then(confirmationResult => {
                        confirmation = confirmationResult;
                        $(`#resendcode`).removeClass('d-none');
                        $(`#code`).removeClass('d-none');
                        $(`#send`).addClass('d-none');
                        $form.find('.error-phone').remove();
                        $loading.remove();
                    }).catch((error) => {
                        console.log(error)
                        var message = error.message;
                        if (window.languages[error.code]) {
                            message = window.languages[error.code];
                        }
                        $form.find('.error-phone').remove();
                        $(`[name="phone"]`).parents(`.form-group`).append(
                            `<div class="invalid-feedback d-block error error-phone">${message}</div>`
                        );
                        $loading.remove();
                    });
            }

        }
        $(`[name="code"]`).on('input', function() {
            var val = $(this).val();
            if (val.length == 6) {
                $(`#confirm`).removeClass('d-none');
            } else {
                $(`#confirm`).addClass('d-none');
            }
        });

        function confirmcode(event) {
            event.preventDefault();
            $loading.appendTo('body');
            var $form = $(event.target).parents(`form`);
            if ($(`[name="code"]`).val()) {
                if (confirmation) {
                    confirmation.confirm($(`[name="code"]`).val())
                        .then(function(result) {
                            var $f = $form.clone();
                            $f.addClass('d-none');
                            $f.appendTo('body');
                            $f.submit();
                        }).catch(function(error) {
                            console.log(error)
                            var message = error.message;
                            if (window.languages[error.code]) {
                                message = window.languages[error.code];
                            }
                            $form.find('.error-code').remove();
                            $(`[name="code"]`).after(
                                `<div class="invalid-feedback d-block error error-code">${message}</div>`
                            );
                            $loading.remove();
                        });

                }
            } else {
                $loading.remove();
                $form.find('.error-code').remove();
                $(`[name="code"]`).after(
                    `<div class="invalid-feedback d-block error error-code">{{ __('Please input code') }}</div>`
                );
            }

        }
    </script>
@endpush
