@extends('layouts.front')
@section('content')
    <section class="aui-scroll-contents">
        <div class="aui-scroll-box pt-0">
            <div class="aui-scroll-content">
                <div class="aui-grid-row aui-grid-row-clear">
                    @foreach ($categories as $category)
                        @if (count($category->products))
                            <a href="{{ route('front.categoryby', $category->id) }}" class="aui-grid-row-item">
                                <i class="aui-icon-large1">
                                    <img data-src="{{ $category->image_url }}" src="{{ asset('images/bg/log.jpg') }}">
                                </i>
                                <p class="aui-grid-row-label text-truncate">{{ $category->name }}</p>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('front.navbar.footer')
    @auth
        <livewire:front.account.notify/>
    @endauth

@endsection
