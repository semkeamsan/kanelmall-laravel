@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-xl-7 row justify-content-center">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('password.reset.phone') }}" novalidate>
                            @csrf
                            <div class="form-group row">
                                <label for="code"
                                    class="col-xl-4 col-form-label">{{ __('Enter the 6 digit code.') }}</label>

                                <div class="col-xl-6">
                                    <div class="input-group otp border">
                                        <input
                                            class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                            type="number" id="first" maxlength="1" />
                                        <input
                                            class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                            type="number" id="second" maxlength="1" />
                                        <input
                                            class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                            type="number" id="third" maxlength="1" />
                                        <input
                                            class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                            type="number" id="fourth" maxlength="1" />
                                        <input
                                            class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                            type="number" id="fifth" maxlength="1" />
                                        <input
                                            class="m-2 text-center form-control form-control-solid rounded focus:border-blue-400 focus:shadow-outline"
                                            type="number" id="sixth" maxlength="1" />
                                    </div>
                                    <input class="form-control d-none" type="number" id="code" name="code" required>

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
                            </div>
                            <div class="form-group row">
                                <label for="phone"
                                    class="col-xl-4 col-form-label">{{ __('Phone Number') }}</label>

                                <div class="col-xl-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text px-2 py-0">
                                                +855
                                            </span>
                                        </div>
                                        <input type="text" class="form-control  @error('phone') is-invalid @enderror"
                                            name="phone" placeholder="" value="{{ old('phone', request('phone')) }}"
                                            required autocomplete="phone" autofocus>
                                        @error('phone')
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



                            <div class="form-group row">
                                <label for="password"
                                    class="col-xl-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col-xl-6">
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

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-xl-4 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-xl-6">
                                    <div class="input-group">
                                        <input type="password" id="password_confirmation"
                                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                                            value="{{ old('password_confirmation') }}" name="password_confirmation"
                                            autocomplete="new-password">

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

                            <div class="form-group row mb-0">
                                <div class="col-xl-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
