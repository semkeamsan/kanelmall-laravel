<div id="livewire">
    <header class="aui-header-default aui-header-fixed">
        <a href="{{ route('front.account.settings') }}" class="aui-header-item">
            <i class="aui-icon aui-icon-back"></i>
        </a>
        <div class="aui-header-center aui-header-center-clear">
            <div class="aui-header-center-logo">
                <div class="">{{ __('My shipping address') }}</div>
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
    <section class="container py-6">
        <div class="row">
            <div class="col-xl-8 mb-3">
                <label class="form-control-label">{{ __('Location') }}</label>
                <div class="form-row p-2 border rounded">
                    <div class="col-xl-12 mb-3">
                        <label for="province" class="form-control-label">{{ __('Province') }}</label>
                        @if (collect($rules)->get('province'))
                            <span class="text-danger text-xs">*</span>
                        @endif

                        <select class="form-control select2" wire:model="province" wire:ignore
                            data-placeholder="{{ __('Please Select') }}">
                            @foreach ($provinces as $item)
                                <option {{ $province == $item->id?'selected': null }} value="{{ $item->id }}">{{ $item->translation->name }}</option>
                            @endforeach
                        </select>
                        @error('province')
                            <div class="error-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if ($districts)
                        <div class="col-xl-12 mb-3">
                            <label for="district" class="form-control-label">{{ __('District') }}</label>
                            @if (collect($rules)->get('district'))
                                <span class="text-danger text-xs">*</span>
                            @endif
                            <select class="form-control select2" wire:model="district" wire:change="district">
                                <option value="">{{ __('Please Select') }}</option>
                                @foreach ($districts as $item)
                                    <option {{ $district == $item->id?'selected': null }} value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                @endforeach
                            </select>
                            @error('district')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif
                    @if ($communes)
                        <div class="col-xl-12 mb-3">
                            <label for="commune" class="form-control-label">{{ __('Commune') }}</label>
                            @if (collect($rules)->get('commune'))
                                <span class="text-danger text-xs">*</span>
                            @endif
                            <select class="form-control select2" wire:model="commune" wire:change="commune">
                                <option value="">{{ __('Please Select') }}</option>
                                @foreach ($communes as $item)
                                    <option {{ $commune == $item->id?'selected': null }} value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                @endforeach
                            </select>
                            @error('commune')
                                <div class="error-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xl-8 mb-3">
                <label for="name" class="form-control-label">{{ __('Address') }}</label>
                @if (collect($rules)->get('address'))
                    <span class="text-danger text-xs">*</span>
                @endif
                @if ($commune)
                    <a href="#" class="float-right btn btn-sm mr-0" wire:click.prevent="samelocation">
                        {{ __('Same Location') }}
                    </a>
                @endif
                <textarea class="form-control" cols="30" rows="3" wire:model="address"></textarea>
                @error('address')
                    <div class="error-feedback d-block">
                        {{ $message }}
                    </div>
                @else
                    <div class="invalid-feedback">
                        {{ __('validation.required', ['attribute' => __('Address')]) }}
                    </div>
                @enderror
            </div>
            <div class="col-xl-8 mb-3">
                <label for="name" class="form-control-label">{{ __('Map') . ' (Embed) ' }}</label>
                @if (collect($rules)->get('latitude') || collect($rules)->get('longitude'))
                    <span class="text-danger text-xs">*</span>
                @endif
                <button class="float-right btn btn-sm mr-0" data-toggle="map">
                    <i class="fas fa-map-marked-alt"></i>
                </button>
                <div class="input-group">
                    {!! Form::text('latitude', $latitude, ['class' => 'form-control', 'placeholder' => __('Latitude'), 'wire:model' => 'latitude']) !!}
                    {!! Form::text('longitude', $longitude, ['class' => 'form-control', 'placeholder' => __('Longitude'), 'wire:model' => 'longitude']) !!}
                </div>
                @if ($latitude && $longitude)
                    <iframe
                        src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl={{ app()->getLocale() }}&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="270" class="border"></iframe>
                @endif
                @error('latitude')
                    <div class="error-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
                @error('longitude')
                    <div class="error-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </section>
    <footer class="aui-footer-product">
        <div class="aui-footer-button-fixed">
            <div class="aui-footer-product-action-list float-right">
                <button type="submit" class="red-color w-100" wire:click="update">{{ __('Update') }}</button>
            </div>
        </div>
    </footer>

    @push('scripts')
        <script>
            $(document).on('click', `[data-toggle="map"]`, function(e) {
                e.preventDefault();

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        @this.set('latitude', position.coords.latitude);
                        @this.set('longitude', position.coords.longitude);
                    }, function(error) {
                        console.warn(`ERROR(${error.code}): ${error.message}`);
                    }, {
                        enableHighAccuracy: true,
                        timeout: 5000,
                        maximumAge: 0
                    });
                } else {
                    $(this).after(`Geolocation is not supported by this browser.`);
                }
            });
        </script>
    @endpush
    @if ($response)
        <script>
            Swal.fire({
                toast: true,
                type: `{{ $response['type'] }}`,
                html: `<span>{{ $response['message'] }}</span>`,
                showConfirmButton: false,
                timer: 3000,
            });
        </script>
    @endif
</div>
