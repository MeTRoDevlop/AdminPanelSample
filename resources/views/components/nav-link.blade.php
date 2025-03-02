@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center py-3 px-6 block border-l-4 pl-8 bg-gray-600 bg-opacity-25 text-gray-100 border-gray-100'
                : 'flex items-center py-3 px-6 block border-l-4 pl-8 border-gray-900 text-gray-400 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
