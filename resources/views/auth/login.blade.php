@extends('layouts.app')
@section('content')
    <!--Login -->
    <section class="py-xl-7 login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="py-3 {{ request()->is('login') ? 'col-xl-8 ' : 'col-xl-12' }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-xl-6">
                                    @if (request()->is('login'))
                                        <div class="section-title text-center">
                                            <h2>{{ __('Login') }}</h2>
                                            @error('status')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    @endif

                                    <form class="form-row align-items-center needs-validation" method="POST" novalidate
                                        action="{{ route('login') }}">
                                        @csrf
                                        <div class="col-sm-12 mb-3">
                                            {{-- <label>{{ __('Email Address') }} / {{ __('Phone Number') }}:</label>
                                            <input type="text" id="email"
                                                class="form-control  @error('email') is-invalid @enderror" name="email"
                                                placeholder="" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @else
                                                <div class="invalid-feedback">
                                                    {{ __('validation.required', ['attribute' => __('E-Mail Address'),', '.__('Phone Number')]) }}
                                                </div>
                                            @enderror --}}
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
                                        <div class="col-sm-12 mb-3">
                                            <label>{{ __('Password') }}:</label>
                                            <div class="input-group">
                                                <input type="password" id="password" name="password"
                                                    class="form-control  @error('password') is-invalid @enderror"
                                                    value="{{ old('password') }}" required placeholder="">

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
                                        <div class="col-md-12 mb-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remember"
                                                    name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label pr-5" for="remember">
                                                    {{ __('Remember Me') }}</label>
                                            </div>

                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-block">{{ __('Login') }}</button>
                                        </div>
                                        <div id="status"></div>
                                    </form>
                                    @if (Route::has('password.request'))
                                        <div class=" my-3">
                                            <div class="col p-0">
                                                <a class="btn float-right btn-sm btn-link"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mt-6">
                                        <div class="text-muted text-center m-2">
                                            <span>{{ __('Login with') }}</span>
                                        </div>
                                        <div class="btn-wrapper text-center">
                                            <a href="{{ route('auth.with','facebook') }}" class="btn btn-neutral btn-icon mb-2">
                                                <span class="btn-inner--icon"><img
                                                        src="{{ asset('images/facebook.svg') }}"></span>
                                                <span class="btn-inner--text">{{ __('Facebook') }}</span>
                                            </a>
                                            <a href="{{ route('auth.with','google') }}" class="btn btn-neutral btn-icon mb-2">
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
    <!--Login -->
@endsection
