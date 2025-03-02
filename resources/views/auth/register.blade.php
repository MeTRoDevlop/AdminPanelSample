<x-app-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('panel.name')"></x-label>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus></x-input>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('panel.login_email')"></x-label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required></x-input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('panel.login_password')"></x-label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"></x-input>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('panel.login_password_confirmation')"></x-label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required></x-input>
            </div>

            <div class="mt-6">
                <a class="hover:underline text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('login') }}">
                    {{ __('panel.already_registered') }}
                </a>

                <x-button class="mt-2">
                    {{ __('panel.register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
