@extends('layouts.front')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .icon {
            padding: 10px;
            font-size: 30px;
            width: 50px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            color: #fff;
        }

        section a.link {
            vertical-align: 10px;
            font-size: 14px;
        }

    </style>
@endpush
@section('meta')
<meta name="author" content="Sem keamsan">
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="og:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="og:image" content="{{ asset('images/logo.jpg') }}" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:site_name" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="article:publisher" content="https://www.facebook.com/semkeamsan" />
<meta property="article:published_time" content="" />
<meta property="article:modified_time" content="" />
<meta property="og:updated_time" content="" />

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
<meta name="twitter:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}">
<meta name="twitter:image" content="{{ asset('images/logo.jpg') }}">
<meta name="twitter:site" content="@semkeamsan">

<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
<link rel="canonical" href="{{ url()->full() }}" />
<meta property="og:locale" content="{{ app()->getLocale() }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="og:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="og:url" content="{{ url()->full() }}" />
<meta property="og:site_name" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="article:publisher" content="https://www.facebook.com/semkeamsan" />
<meta property="article:section" content="Blog" />
<meta property="og:updated_time" content="" />
<meta property="og:image" content="{{ asset('images/logo.jpg') }}" />
<meta property="og:image:secure_url" content="{{ asset('images/logo.jpg') }}" />
<meta property="og:image:width" content="1920" />
<meta property="og:image:height" content="1280" />
<meta property="og:image:alt" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta property="og:image:type" content="image/jpeg" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta name="twitter:description" content="{{ env('APP_NAME') }} — {{ __('Buy and sell') }}" />
<meta name="twitter:site" content="@semkeamsan" />
<meta name="twitter:creator" content="@semkeamsan" />
<meta name="twitter:image" content="{{ asset('images/logo.jpg') }}" />
@endsection
@section('content')
    <div class="aui-content-box pt-0">
        <section class="p-1">
            @foreach ($chatmanagers as $chat)
            <div>
                <a href="{{ $chat->link }}">
                    <i class="icon {{ $chat->icon }}" @if( $chat->color) style="background:{{ $chat->color }}" @endif style="color:inherit"></i>
                </a>
                <a class="link" href="{{ $chat->link }}"> {{ $chat->name }} </a>
            </div>
            @endforeach
        </section>
    </div>
    @include('front.navbar.footer')
   
@endsection

@push('scripts')
      <!-- Messenger Chat Plugin Code -->
      <div id="fb-root"></div>

      <!-- Your Chat Plugin code -->
      <div id="fb-customer-chat" class="fb-customerchat">
      </div>

      <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "104230302176111");
        chatbox.setAttribute("attribution", "biz_inbox");
      </script>

      <!-- Your SDK code -->
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v12.0'
          });
        };

        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>
@endpush
