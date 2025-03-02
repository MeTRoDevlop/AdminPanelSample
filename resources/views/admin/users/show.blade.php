
<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.show') }} {{ __('panel.user.title') }}
        </x-slot>

        <table class="striped bordered w-full table-auto bg-white ">
            <tbody>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.user.fields.id') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $user->id }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.user.fields.name') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $user->name }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.user.fields.email') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $user->email }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.user.fields.email_verified_at') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $user->email_verified_at }}
                    </td>
                </tr>
                <tr>
                    <th class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ __('panel.user.fields.role') }}
                    </th>
                    <td class="p-3 {{(App::isLocale('fa') ? 'text-right' : 'text-left')}}">
                        {{ $user->role->label }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="items-center flex justify-end pt-4">
            <a class="inline-block px-3 py-2 rounded-sm text-sm mx-1 -my-2 select-none cursor-pointer text-gray-900 focus:outline-none hover:no-underline bg-gray-300 text-white hover:bg-gray-400" href="{{ route('admin.users.index') }}">
                {{ __('panel.back_to_list') }}
            </a>
        </div>

    </x-main-card>
</x-panel-layout>
