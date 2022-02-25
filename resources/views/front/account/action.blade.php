<section class="aui-grid-content border">
    <div class="aui-grid-row">
        <a href="{{ route('front.account.myorder', 'status=all') }}" class="aui-grid-row-item {{ request('status',@$status) == 'all'? 'aui-grid-active': null  }}"
        @if (Str::contains(url()->current(),'order'))
            wire:click.prevent="status('all')"
        @endif>
            <i class="aui-icon-large aui-icon-large-sm aui-icon-wallet"></i>
            <p class="aui-grid-row-label">{{ __('All') }}</p>
        </a>
        <a href="{{ route('front.account.myorder', 'status=pending') }}" class="aui-grid-row-item {{ request('status',@$status) == 'pending'? 'aui-grid-active': null  }}"
        @if (Str::contains(url()->current(),'order'))
            wire:click.prevent="status('pending')"
        @endif>
            <i class="aui-icon-large aui-icon-large-sm aui-icon-pending"></i>
            <p class="aui-grid-row-label">{{ __('Pending') }}</p>
        </a>
        <a href="{{ route('front.account.myorder', 'status=paid') }}" class="aui-grid-row-item {{ request('status',@$status) == 'paid'? 'aui-grid-active': null  }}"
        @if (Str::contains(url()->current(),'order'))
            wire:click.prevent="status('paid')"
        @endif>
            <i class="aui-icon-large aui-icon-large-sm aui-icon-goods"></i>
            <p class="aui-grid-row-label">{{ __('Paid') }}</p>
        </a>
        <a href="{{ route('front.account.myorder', 'status=received') }}" class="aui-grid-row-item {{ request('status',@$status) == 'received'? 'aui-grid-active': null  }}"
        @if (Str::contains(url()->current(),'order'))
            wire:click.prevent="status('received')"
        @endif>
            <i class="aui-icon-large aui-icon-large-sm aui-icon-receipt"></i>
            <p class="aui-grid-row-label">{{ __('Received') }}</p>
        </a>

        <a href="{{ route('front.account.myorder', 'status=cancel') }}" class="aui-grid-row-item {{ request('status',@$status) == 'cancel'? 'aui-grid-active': null  }}"
        @if (Str::contains(url()->current(),'order'))
            wire:click.prevent="status('cancel')"
        @endif>
            <i class="aui-icon-large aui-icon-large-sm aui-icon-refund"></i>
            <p class="aui-grid-row-label">{{ __('Cancel') }}</p>
        </a>
    </div>
</section>
