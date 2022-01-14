<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Payment') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            {{-- <th></th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $key => $row)
            @php
                $row->product = gettype($row->product) == 'string' ? json_decode($row->product) : $row->product;
            @endphp
            <tr>
                <td>{{ count($collection) - $key }}</td>
                <td>
                    <div class="media align-items-center">
                        <a href="#" target="_blank" class="border avatar avatar-sm bg-transparent mr-3">
                            <img src="{{ product($row->product_id)->image_url }}">
                        </a>
                        <div class="media-body">
                            <span class="name mb-0 text-sm">{{ $row->product->name }}</span>
                        </div>
                    </div>
                </td>
                <td>
                    @if ($row->payment)
                        <a href="{{ $row->payment }}" target="_blank" class="border avatar avatar-sm bg-transparent mr-3">
                            <img src="{{ $row->payment }}">
                        </a>
                    @else
                        <span class="text-danger">{{ __('N/A') }}</span>
                    @endif

                </td>
                <td>
                    {{-- <span class="badge badge-lg badge-dot">
                        @if ($row->status == 'pending')
                            <i class="bg-danger"></i>
                        @elseif ($row->status == 'delivered')
                            <i class="bg-info"></i>
                        @elseif($row->status == 'received')
                            <i class="bg-success"></i>
                        @endif
                        {{ __(Str::title($row->status)) }}
                    </span> --}}
                    @php
                        $list = [
                            'pending' => __('Pending'),
                            'delivered' => __('Delivered'),
                            'received' => __('Received'),
                        ];
                    @endphp
                    {!! Form::select('status', $list, $row->status, ['class' => 'form-control', 'data-toggle' => 'select', 'data-url' => route('admin.order.update', $row)]) !!}

                </td>
                <td>{{ $row->created_at ? $row->created_at->diffForHumans() : null }}</td>
                <td>{{ $row->updated_at ? $row->updated_at->diffForHumans() : null }}</td>
                {{-- <td
                    class="text-right {{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
                    <div class="dropdown dropleft">
                        <a class="btn btn-sm btn-icon-only table-dropdown text-light" href="#" order="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                         <a class="dropdown-item {{ config('page.permissions')->contains('show') ?: 'd-none' }}"
                                    href="{{ route('admin.order.show', $row) }}">
                                    <i class="fal fa-eye"></i>
                                    {{ __('View') }}
                                </a>
                                <a class="dropdown-item {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}"
                                    href="{{ route('admin.order.edit', $row) }}">
                                    <i class="fal fa-edit"></i>
                                    {{ __('Edit') }}
                                </a>
                                {!! Form::open(['url' => route('admin.order.destroy', $row), 'method' => 'delete']) !!}
                                <button type="submit"
                                    class="dropdown-item {{ config('page.permissions')->contains('destroy') ?: 'd-none' }}">
                                    <i class="fal fa-trash"></i>
                                    {{ __('Delete') }}
                                </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </td> --}}

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
