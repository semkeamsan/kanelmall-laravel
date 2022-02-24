<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Transaction') }}</th>
            <th>{{ __('User') }}</th>
            <th>{{ __('Payment') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Products') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $key => $row)
            <tr>
            <td>{{ $row->transaction_id }}</td>
            <td>
                <div class="media align-items-center">
                    <a href="#" target="_blank" class="avatar avatar-sm rounded-circle mr-3">
                        <img src="{{ $row->user->avatar }}">
                    </a>
                    <div class="media-body">
                        <span class="name mb-0 text-sm">{{ $row->user->name }}</span>
                    </div>
                </div>
            </td>
                <td>
                    @if ($row->payment_image)
                        <a href="{{ $row->payment_image }}" target="_blank" class="border avatar avatar-sm bg-transparent mr-3">
                            <img src="{{ $row->payment_image }}">
                        </a>
                    @else
                        <span class="text-danger">{{ __('N/A') }}</span>
                    @endif

                </td>
                <td>
                    @php
                        $list = [
                            'paid' => __('Paid'),
                            'delivered' => __('Delivered'),
                            'cancel' => __('Cancel'),
                            'received' => __('Received'),
                        ];
                    @endphp
                    {!! Form::select('status', $list, $row->status, ['class' => 'form-control', 'data-toggle' => 'select', 'data-url' => route('admin.order.update', $row)]) !!}

                </td>
                <td>
                    <table class="table table-sm table-bordered">
                        <thead>
                            <th colspan="2">{{ $row->created_at->translatedFormat('d-M-Y') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($row->products as $k => $p)
                            <tr>
                                <td>
                                    {{ $k+ 1 }}
                                </td>
                                <td>
                                    <div class="media align-items-center">
                                        <a href="#" target="_blank" class="avatar avatar-sm rounded-circle mr-3">
                                            <img src="{{ $p->product->image_url }}">
                                        </a>
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">{{ $p->product->name }}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
                <td
                    class="text-right {{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
                    <div class="dropdown dropleft">
                        <a class="btn btn-sm btn-icon-only table-dropdown text-light" href="#" order="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                            {{-- <a class="dropdown-item {{ config('page.permissions')->contains('show') ?: 'd-none' }}"
                                    href="{{ route('admin.order.show', $row) }}">
                                    <i class="fal fa-eye"></i>
                                    {{ __('View') }}
                                </a>
                                <a class="dropdown-item {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}"
                                    href="{{ route('admin.order.edit', $row) }}">
                                    <i class="fal fa-edit"></i>
                                    {{ __('Edit') }}
                                </a> --}}
                                {!! Form::open(['url' => route('admin.order.destroy', $row), 'method' => 'delete']) !!}
                                <button type="submit"
                                    class="dropdown-item {{ config('page.permissions')->contains('destroy') ?: 'd-none' }}">
                                    <i class="fal fa-trash"></i>
                                    {{ __('Delete') }}
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>

</table>
@push('scripts')
<script>
    $(`[name="status"]`).change(function() {
        var val = $(this).val();
        var url = $(this).data('url');
        $.post(url, {
            _token: `{{ csrf_token() }}`,
            _method: 'put',
            status: val
        }).done(res => {
            if (res && res.status) {
                if ($.notify) {
                    $.notify({
                        icon: 'fal fa-check-circle',
                        message: res.message,
                        url: ""
                    }, {
                        element: "body",
                        type: 'success',
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        offset: {
                            x: 15,
                            y: 15
                        },
                        delay: 2500,
                        url_target: "_blank",
                        template: '<div data-notify="container" class="alert alert-dismissible alert-{0} alert-notify w-auto" role="alert"><span class="alert-icon" data-notify="icon"></span> <div class="alert-text"</div> <span class="alert-title" data-notify="title">{1}</span> <span data-notify="message">{2}</span></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
                    });
                }

            }
        });
    });
</script>
@endpush
