
<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.show') }} {{ __('panel.role.title') }}
        </x-slot>

        <table class="striped bordered w-full table-auto bg-white ">
            <tbody>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.role.fields.id') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $role->id }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.role.fields.label') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $role->label }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.role.fields.title') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $role->title }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.role.fields.permissions') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        @foreach($role->permissions as $key => $permissions)
                            <span class="inline-block text-xs px-2 py-1 mr-1 mb-1 rounded-lg text-white bg-blue-600">
                                {{ $permissions->label }}
                            </span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="items-center flex justify-end pt-4">
            <a class="inline-block px-3 py-2 rounded-sm text-sm mx-1 -my-2 select-none cursor-pointer text-gray-900 focus:outline-none hover:no-underline bg-gray-300 text-white hover:bg-gray-400" href="{{ route('admin.roles.index') }}">
                {{ __('panel.back_to_list') }}
            </a>
        </div>

    </x-main-card>
</x-panel-layout>
