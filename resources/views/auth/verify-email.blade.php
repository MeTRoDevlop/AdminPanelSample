<x-app-layout>
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('panel.verify_massage') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('panel.verify_massage2') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('panel.resend_verify') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('panel.logout') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-app-layout>
