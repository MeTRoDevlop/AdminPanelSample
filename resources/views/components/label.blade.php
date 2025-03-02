@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-small text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
