<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.user.title') }}

            @can('user_create')
                <div class="block">
                    <a class="inline-block px-3 py-2 rounded-sm text-sm mx-1 -my-2 select-none cursor-pointer focus:outline-none hover:no-underline bg-green-600 text-white hover:bg-green-500" href="{{ route('admin.users.create') }}">
                        {{ __('panel.add') }} {{ __('panel.user.title_singular') }}
                    </a>
                </div>
            @endcan
        </x-slot>

        <x-data-table>
            <table class="stripe hover bordered datatable datatable-User">
                <thead>
                <tr>
                    <th width="10" class="select no-export">

                    </th>
                    <th>
                        {{ __('panel.user.fields.id') }}
                    </th>
                    <th>
                        {{ __('panel.user.fields.name') }}
                    </th>
                    <th>
                        {{ __('panel.user.fields.email') }}
                    </th>
                    <th>
                        {{ __('panel.user.fields.email_verified_at') }}
                    </th>
                    <th>
                        {{ __('panel.user.fields.role') }}
                    </th>
                    <th class="action no-export">
                        {{ __('panel.actions') }}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr data-entry-id="{{ $user->id }}" class="{{ ($user->id == 1) ? 'no-select' : '' }}">
                        <td class="text-center no-export">

                        </td>
                        <td class="text-center">
                            {{ $user->id ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $user->name ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $user->email ?? '' }}
                        </td>
                        <td class="text-center">
                            {{ $user->email_verified_at ?? '' }}
                        </td>
                        <td class="text-center">
                            <span class="inline-block text-xs px-2 py-1 mr-1 mb-1 rounded-lg text-white bg-blue-600">
                                {{ $user->role->label }}
                            </span>
                        </td>
                        <td class="action text-center no-export">
                            @can('user_show')
                                <a class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer focus:outline-none hover:no-underline bg-indigo-600 text-white hover:bg-indigo-700" href="{{ route('admin.users.show', $user->id) }}">
                                    {{ __('panel.view') }}
                                </a>
                            @endcan

                            @can('user_edit')
                                <a class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer focus:outline-none hover:no-underline bg-blue-600 text-white hover:bg-blue-500" href="{{ route('admin.users.edit', $user->id) }}">
                                    {{ __('panel.edit') }}
                                </a>
                            @endcan

                            @can('user_delete')
                            @if($user->id != 1)
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ __('panel.areYouSure') }}');" style="display: inline-block;">
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

                @can('user_delete')
                let deleteButton = {
                    text: '{{ __('panel.datatables.delete') }}',
                    url: "{{ route('admin.users.massDestroy') }}",
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
                let table = $('.datatable-User:not(.ajaxTable)').DataTable({buttons: dtButtons})
                $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            })
        </script>
    @endpush
</x-panel-layout>



