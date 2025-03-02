<x-app-layout>

    @auth
    <x-slot name="menu">
        @include('layouts.menu')
    </x-slot>

    <x-slot name="header">
        @include('layouts.navigation')
    </x-slot>
    @endauth

    <div class="mx-auto py-8 px-6 lg:px-8">
        @if(session('message'))
            <div class="w-full shadow-md rounded-lg overflow-hidden mb-4 py-4 px-6 font-medium text-green-700 bg-green-300">
                {{ session('message') }}
            </div>
        @endif
        @if($errors->count() > 0)
            <div class="w-full shadow-md rounded-lg overflow-hidden mb-4 py-4 px-6 font-medium text-red-700 bg-red-300">
                <ul class="list-none">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </div>

</x-app-layout>
