@extends('layouts.app')
@section('content')
    <section class="py-7 verify">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="needs-validation" method="POST" action="{{ route('auth.phone.verify') }}" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ __('Enter the 6 digit code we sent you via phone number to continue') }}</h3>
                            </div>
                            <div class="card-body p-0 p-xl-3">

                                <div class="input-group otp">
                                    <input
                                        class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                        type="text" id="first" maxlength="1" />
                                    <input
                                        class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                        type="text" id="second" maxlength="1" />
                                    <input
                                        class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                        type="text" id="third" maxlength="1" />
                                    <input
                                        class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                        type="text" id="fourth" maxlength="1" />
                                    <input
                                        class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                        type="text" id="fifth" maxlength="1" />
                                    <input
                                        class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                        type="text" id="sixth" maxlength="1" />
                                </div>
                                <input type="text" id="code" name="code" class="form-control d-none" required>
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @else
                                    <div class="invalid-feedback">
                                        {{ __('validation.required', ['attribute' => __('Code')]) }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="">
                        {{ __('Before proceeding, please check your phone number for a verification code.') }}
                        {{ __('If you did not receive the code') }},
                        <button id="sendcode"
                            class="btn btn-sm btn-link">{{ __('click here to request another') }}</button>.
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div id="recaptcha-container"></div>
@endsection
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

        $(`#sendcode`).on('click',(e) => {
            e.preventDefault();
            firebase.auth().signInWithPhoneNumber(`+855{{ auth()->user()->phone }}`, window.recaptchaVerifier)
                .then(confirmationResult => {
                    confirmation = confirmationResult;
                    $(`form.needs-validation`).find('.card-footer').removeClass('d-none');
                    $(`#sendcode`).parent().addClass('d-none');
                }).catch(error => console.log(error));
        });
        $(`form.needs-validation`).submit(function(ev) {
            ev.preventDefault();
            var $form = $(this);
            if (this.checkValidity()) {
                if (confirmation) {

                    confirmation.confirm($(this).find(`[name="code"]`).val())
                        .then(function(result) {
                            var $f = $form.clone();
                            $f.addClass('d-none');
                            $f.appendTo('body');
                            $f.submit();
                        }).catch(function(error) {
                            console.log(error.message)
                            $modal.find('.has-error').remove();
                            $modal.find(`.otp`).after(
                                `<div class="has-error text-danger">${error.message}</div>`
                            );
                        });
                }
            }
        });
        $(document).ready(()=>{
            $(`#sendcode`).trigger('click');
        });
    </script>

@endpush
