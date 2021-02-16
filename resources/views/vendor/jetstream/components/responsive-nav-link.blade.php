@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white transition duration-150 ease-in-out hover:bg-opacity-50 hover:bg-white'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-white transition duration-150 ease-in-out hover:bg-opacity-50 hover:bg-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
