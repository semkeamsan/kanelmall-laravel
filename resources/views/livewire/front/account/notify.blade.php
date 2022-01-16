<div>
    @if (!session('hide_notify'))
        @if (count($orders))
            <div id="my-modal" class="modal fade show d-block" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Order') }}</th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>
                                                {{ $order->created_at->translatedFormat('d-M-Y') }}
                                                <br>
                                                <span>{{ __('Status') }} :
                                                    {{ __(Str::title($order->status)) }}</span>
                                            </td>
                                            <td>
                                                <table class="table table-sm table-bordered">
                                                    <thead>
                                                        <th class="d-none">{{ __('Id') }}</th>
                                                        <th>{{ __('Name') }}</th>
                                                        <th>{{ __('Qty') }}</th>
                                                        <th>{{ __('Price') }}</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->products as $j => $o)
                                                            <tr>
                                                                <td class="d-none">{{ $j + 1 }}</td>
                                                                <td>
                                                                    <div class="media align-items-center">
                                                                        <a href="{{ route('front.product', $o->product->id) }}"
                                                                            target="_blank"
                                                                            class="border avatar avatar-sm bg-transparent mr-3">
                                                                            <img src="{{ $o->product->image_url }}">
                                                                        </a>
                                                                        <div class="media-body d-none d-xl-block">
                                                                            <span class="name mb-0 text-sm">
                                                                                {{ $o->product->name }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $o->qty }}</td>
                                                                <td>
                                                                    {{ currency($o->product->selling_price, 'USD', session('currency')) }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer pt-0">
                            <button class="btn btn-secondary" wire:click="close">{{ __('Close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show"  wire:click="close"></div>
        @else
            <div wire:poll.keep-alive="todo"></div>
        @endif
    @endif
</div>
