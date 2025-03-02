<x-app-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('panel.login_email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('panel.login_password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="flex justify-between mt-5">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('panel.remember_me') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="hover:underline text-sm text-indigo-600 hover:text-indigo-900 text-right" href="{{ route('password.request') }}">
                        {{ __('panel.forgot_password') }}
                    </a>
                @endif
            </div>

            <div class="mt-6">
                <x-button>
                    {{ __('panel.login') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
