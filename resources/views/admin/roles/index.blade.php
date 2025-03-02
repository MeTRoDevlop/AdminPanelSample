<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.role.title') }}

            @can('role_create')
                <div class="block">
                    <a class="inline-block px-3 py-2 rounded-sm text-sm mx-1 -my-2 select-none cursor-pointer focus:outline-none hover:no-underline bg-green-600 text-white hover:bg-green-500" href="{{ route('admin.roles.create') }}">
                        {{ __('panel.add') }} {{ __('panel.role.title_singular') }}
                    </a>
                </div>
            @endcan
        </x-slot>

        <x-data-table>
            <table class="stripe hover bordered datatable datatable-Role">
                <thead>
                <tr>
                    <th width="10" class="select no-export">

                    </th>
                    <th>
                        {{ __('panel.role.fields.id') }}
                    </th>
                    <th>
                        {{ __('panel.role.fields.label') }}
                    </th>
                    <th>
                        {{ __('panel.role.fields.title') }}
                    </th>
                    <th>
                        {{ __('panel.role.fields.permissions') }}
                    </th>
                    <th class="action no-export">
                        {{ __('panel.actions') }}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $key => $role)
                    <tr data-entry-id="{{ $role->id }}" class="{{ ($role->id == 1) ? 'no-select' : '' }}">
                        <td class="text-center no-export">

                        </td>
                        <td class="text-center">
                            {{ $role->id ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $role->label ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $role->title ?? '' }}
                        </td>
                        <td class="text-center">
                            @foreach($role->permissions as $key => $item)
                                <span class="inline-block text-xs px-2 py-1 mr-1 mb-1 rounded-lg text-white bg-blue-600">
                                    {{ $item->label }}
                                </span>
                            @endforeach
                        </td>
                        <td class="action text-center no-export">
                            @can('role_show')
                                <a class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer focus:outline-none hover:no-underline bg-indigo-600 text-white hover:bg-indigo-700" href="{{ route('admin.roles.show', $role->id) }}">
                                    {{ __('panel.view') }}
                                </a>
                            @endcan

                            @can('role_edit')
                                <a class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer focus:outline-none hover:no-underline bg-blue-600 text-white hover:bg-blue-500" href="{{ route('admin.roles.edit', $role->id) }}">
                                    {{ __('panel.edit') }}
                                </a>
                            @endcan

                            @can('role_delete')
                            @if($role->id != 1)
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ __('panel.areYouSure') }}');" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer focus:outline-none hover:no-underline bg-red-600 text-white hover:bg-red-500" value="{{ __('panel.delete') }}">
                                </form>
                            @endif
                            @endcan

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-data-table>
    </x-main-card>

    @push('scripts')
        <script>
            $(function () {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

                @can('role_delete')
                let deleteButton = {
                    text: '{{ __('panel.datatables.delete') }}',
                    url: "{{ route('admin.roles.massDestroy') }}",
                    className: 'bg-red-600 text-white hover:bg-red-500',
                    action: function (e, dt, node, config) {
                        var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
                            return $(entry).data('entry-id')
                        });
                        if (ids.length === 0) {
                            alert('{{ __('panel.datatables.zero_selected') }}')
                            return
                        }
                        if (confirm('{{ __('panel.areYouSure') }}')) {
                            $.ajax({
                                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                                method: 'POST',
                                url: config.url,
                                data: {ids: ids, _token: $('meta[name="csrf-token"]').attr('content'), _method: 'DELETE'}
                            }).done(function () {
                                location.reload()
                            })
                        }
                    }
                }
                dtButtons.push(deleteButton)
                @endcan

                $.extend(true, $.fn.dataTable.defaults, {
                    orderCellsTop: true,
                    order: [[1, 'asc']],
                    pageLength: 25,
                });
                let table = $('.datatable-Role:not(.ajaxTable)').DataTable({buttons: dtButtons})
                $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            })
        </script>
    @endpush
</x-panel-layout>



