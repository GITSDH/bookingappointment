@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 py-4 border-b-2 border-white text-sm font-medium leading-5 text-white focus:outline-none focus:border-white transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 py-4 border-b-2 border-transparent text-sm font-medium leading-5 text-white hover:text-white hover:border-white focus:outline-none focus:white-700 focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
