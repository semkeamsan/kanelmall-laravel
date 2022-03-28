<footer class="aui-footer-default aui-footer-fixed border">
    <a href="{{  LaravelLocalization::getLocalizedURL(app()->getLocale(),route('front.home'))  }}" class="aui-footer-item {{   Str::contains(url()->current(), 'home') ? 'aui-footer-active' : null }}">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-home"></span>
        <span class="aui-footer-item-text">{{ __('Home') }}</span>
    </a>
    <a href="{{  LaravelLocalization::getLocalizedURL(app()->getLocale(),route('front.category'))  }}" class="aui-footer-item {{ Str::contains(url()->current(), 'category') ? 'aui-footer-active' : null }}">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-class"></span>
        <span class="aui-footer-item-text">{{ __('Category') }}</span>
    </a>
    <a href="{{  LaravelLocalization::getLocalizedURL(app()->getLocale(),route('front.chat'))  }}" class="aui-footer-item {{ Str::contains(url()->current(), 'chat') ? 'aui-footer-active' : null }}"">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-chat"></span>
        <span class="aui-footer-item-text">{{ __('Chat') }}</span>
    </a>
    <a href="{{  LaravelLocalization::getLocalizedURL(app()->getLocale(),route('front.cart'))  }}" class="aui-footer-item {{ Str::contains(url()->current(), 'cart') ? 'aui-footer-active' : null }}">
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-cart">
            <span class="text-white right--4 position-absolute top--1 bg-primary px-2 rounded-pill" id="cart-count">
                {{ Cart::count() }}
            </span>
        </span>
        <span class="aui-footer-item-text">{{ __('Cart') }}</span>
    </a>
    <a href="{{ LaravelLocalization::getLocalizedURL(app()->getLocale(),route('front.account.index')) }}" class="aui-footer-item {{ Str::contains(url()->current(), 'account') ? 'aui-footer-active' : null }}" wire:ignore>
        <span class="aui-footer-item-icon aui-icon aui-footer-icon-me"></span>
        <span class="aui-footer-item-text">{{ __('Account') }}</span>
    </a>
</footer>
