@extends('layouts.app')
@section('content')
    <section class="py-7 verify">
        <div class="container my-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="d-inline" method="get" action="{{ route('auth.phone.verify') }}" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ __('Enter the 6 digit code we sent you via phone number to continue') }}</h3>
                            </div>
                            <div class="card-body">
                                <input type="hidden" id="code" name="code">
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



                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Verify') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <form class="d-inline" method="get" action="{{ route('auth.phone.verify') }}" novalidate>
                        @csrf
                        {{ __('Before proceeding, please check your phone number for a verification code.') }}
                            {{ __('If you did not receive the code') }},
                        <button type="submit"
                            class="btn btn-sm btn-link">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
