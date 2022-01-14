<table class="table" id="datatable-basic" data-text-all="{{ __('All') }}">
    <thead class="thead-light">
        <tr>
            <th>{{ __('Id') }}</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Code') }}</th>
            <th>{{ __('Symbol') }}</th>
            <th>{{ __('Format') }}</th>
            <th>{{ __('Exchange rate') }}</th>
            <th>{{ __('Created at') }}</th>
            <th>{{ __('Updated at') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection as $row)

            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->code }}</td>
                <td>{{ $row->symbol }}</td>
                <td>{{ $row->format }}</td>
                <td>{{ $row->exchange_rate }}</td>

                <td>{{ $row->created_at ? (new Carbon($row->created_at))->diffForHumans() : null }}</td>
                <td>{{ $row->updated_at ? (new Carbon($row->updated_at))->diffForHumans() : null }}</td>
                <td
                    class="text-right {{ config('page.permissions')->count() == 1 && config('page.permissions')->contains('index') ? 'd-none' : null }}">
                    <div class="dropdown dropleft">
                        <a class="btn btn-sm btn-icon-only table-dropdown text-light" href="#" currency="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fal fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                         <a class="dropdown-item {{ config('page.permissions')->contains('show') ?: 'd-none' }}"
                                    href="{{ route('admin.currency.show', $row->id) }}">
                                    <i class="fal fa-eye"></i>
                                    {{ __('View') }}
                                </a>
                                <a class="dropdown-item {{ config('page.permissions')->contains('edit-update') ?: 'd-none' }}"
                                    href="{{ route('admin.currency.edit', $row->id) }}">
                                    <i class="fal fa-edit"></i>
                                    {{ __('Edit') }}
                                </a>
                                {!! Form::open(['url' => route('admin.currency.destroy', $row->code), 'method' => 'delete']) !!}
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
