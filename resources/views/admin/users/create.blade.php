<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.create') }} {{ __('panel.user.title_singular') }}
        </x-slot>

        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('panel.user.fields.name')"></x-label>

                <x-input id="name" type="text" name="name" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('name') ? 'border-red-500' : '' }}" required></x-input>

            </div>

            <!-- Email Address -->
            <div class="mt-3">
                <x-label for="email" :value="__('panel.user.fields.email')"></x-label>

                <x-input id="email" type="email" name="email" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('email') ? 'border-red-500' : '' }}" required></x-input>
            </div>

            <!-- Password -->
            <div class="mt-3">
                <x-label for="password" :value="__('panel.user.fields.password')"></x-label>

                <x-input id="password" type="password" name="password" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('password') ? 'border-red-500' : '' }}" required></x-input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('panel.user.fields.password_confirmation') "></x-label>

                <x-input id="password_confirmation" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('password_confirmation') ? 'border-red-500' : '' }}"
                         type="password"
                         name="password_confirmation" required></x-input>
            </div>

            <!-- Role -->
            <div class="mt-3">
                <x-label for="role" :value="__('panel.user.fields.role')"></x-label>

                {{--<div style="padding-bottom: 4px">
                    <span class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer hover:no-underline focus:outline-none bg-indigo-600 text-white hover:bg-indigo-700 select-all" style="border-radius: 0">{{ __('panel.select_all') }}</span>
                    <span class="inline-block px-2 py-1 rounded-sm text-xs mr-1 mt-1 select-none cursor-pointer hover:no-underline focus:outline-none bg-indigo-600 text-white hover:bg-indigo-700 deselect-all" style="border-radius: 0">{{ __('panel.deselect_all') }}</span>
                </div>--}}

                <select class="select2 lg:w-2/5 w-full {{ $errors->has('role') ? 'border-red-500' : '' }}" name="role" id="role" single required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" >{{ $role }}</option>
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
                $('.select2').select2();
            });
        </script>

    @endpush
</x-panel-layout>
