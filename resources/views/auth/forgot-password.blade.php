<x-app-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('panel.forgot_message') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('panel.login_email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="items-center mt-6">
                <x-button>
                    {{ __('panel.send_password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
