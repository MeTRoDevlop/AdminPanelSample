<x-panel-layout>
    <x-main-card>
        <x-slot name="panel_header">
            {{ __('panel.change_password') }}
        </x-slot>

        <form method="POST" action="{{ route('profile.password.update') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('panel.login_email')"></x-label>

                <x-input id="email" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('email') ? 'border-red-500' : '' }}" type="email" name="email" :value="old('email', Auth::user()->email)" readonly disabled></x-input>
            </div>


            <!-- Current Password -->
            <div class="mt-4">
                <x-label for="current_password" :value="__('panel.current_password') "></x-label>

                <x-input id="current_password" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('current_password') ? 'border-red-500' : '' }}" type="password" name="current_password" required autofocus></x-input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('panel.new_password') "></x-label>

                <x-input id="password" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('password') ? 'border-red-500' : '' }}" type="password" name="password" required></x-input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('panel.login_password_confirmation') "></x-label>

                <x-input id="password_confirmation" class="block mt-1 lg:w-2/5 w-full {{ $errors->has('password_confirmation') ? 'border-red-500' : '' }}"
                         type="password"
                         name="password_confirmation" required></x-input>
            </div>

            <div class="items-center mt-6 flex justify-end">
                <x-button class="w-max">
                    {{ __('panel.reset_password') }}
                </x-button>
            </div>
        </form>

    </x-main-card>
</x-panel-layout>
