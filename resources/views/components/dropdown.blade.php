@props(['activeRoute' => 'false', 'status' => 'temp', 'parentClass' => 'absolute right', 'width' => 'auto', 'contentClass' => 'round white pad'])

@php
    switch ($status) {
        case 'stay':
            $away = '';
            break;
        case 'temp':
            $away = 'open = false';
            break;
    }
    switch ($parentClass) {
        case 'absolute right':
            $parentClasses = 'absolute origin-top-right right-0 z-50';
            break;
        case 'absolute left':
            $parentClasses = 'absolute origin-top-left left-0 z-50';
            break;
        case 'absolute top':
            $parentClasses = 'absolute origin-top z-50';
            break;
        case 'inherit':
            $parentClasses = 'inherit';
    }
    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
        case 'auto':
            $width = 'w-auto';
            break;
    }
    switch ($contentClass) {
        case 'round white pad':
            $contentClasses = 'rounded-md py-1 bg-white';
            break;
        case 'gray pad':
            $contentClasses = 'pl-2 bg-gray-800';
    }
@endphp

<div class="relative" x-data="{ open: {{ $activeRoute }} }" @click.away="{{ $away }}" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class=" {{ $parentClasses }} mt-2 {{ $width }} rounded-md shadow-lg"
            style="display: none;"
            @click="open = false">
        <div class="ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
