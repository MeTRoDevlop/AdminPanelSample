<x-app-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('panel.secure_area') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('panel.login_password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="mt-6">
                <x-button>
                    {{ __('panel.confirm_password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
