<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.create') }} {{ __('panel.role.title_singular') }}
        </x-slot>

        <form method="POST" action="{{ route("admin.roles.store") }}" enctype="multipart/form-data">
            @csrf

            <!-- Label -->
            <div>
                <x-label for="label" :value="__('panel.role.fields.label')"></x-label>

                <x-input id="label" type="text" name="label" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('label') ? 'border-red-500' : '' }}" required></x-input>

            </div>

            <!-- Title -->
            <div class="mt-3">
                <x-label for="title" :value="__('panel.role.fields.title')"></x-label>

                <x-input id="title" type="text" name="title" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('title') ? 'border-red-500' : '' }}" required></x-input>
            </div>

            <!-- Permission -->
            <div class="mt-3">
                <x-label for="permission" :value="__('panel.role.fields.permissions')"></x-label>

                <div style="padding-bottom: 4px">
                    <span class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer hover:no-underline focus:outline-none bg-indigo-600 text-white hover:bg-indigo-700 select-all" style="border-radius: 0">{{ __('panel.select_all') }}</span>
                    <span class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer hover:no-underline focus:outline-none bg-indigo-600 text-white hover:bg-indigo-700 deselect-all" style="border-radius: 0">{{ __('panel.deselect_all') }}</span>
                </div>

                <select class="select2 lg:w-2/5 w-full {{ $errors->has('permission') ? 'border-red-500' : '' }}" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
            </div>

            <div class="items-center flex justify-end pt-6">
                <x-button class="w-max">
                    {{ __('panel.save') }}
                </x-button>
            </div>
        </form>

    </x-main-card>


    @push('styles')
        <!-- List Select -->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />-->
        <link rel="stylesheet" href="{{ asset('libs/css/select2.min.css') }}">
    @endpush

    @push('scripts')
        <!-- jQuery -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
        <script src="{{ asset('libs/js/jquery.min.js') }}" type="text/javascript" ></script>

        <!-- create edit -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>-->
        <script src="{{ asset('libs/js/select2.full.min.js') }}" type="text/javascript" ></script>

        <script>
            $(document).ready(function() {

                $('.select-all').click(function () {
                    let $select2 = $(this).parent().siblings('.select2')
                    $select2.find('option').prop('selected', 'selected')
                    $select2.trigger('change')
                })
                $('.deselect-all').click(function () {
                    let $select2 = $(this).parent().siblings('.select2')
                    $select2.find('option').prop('selected', '')
                    $select2.trigger('change')
                })

                $('.select2').select2();
            });
        </script>

    @endpush
</x-panel-layout>
