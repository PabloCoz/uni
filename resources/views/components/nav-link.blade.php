@props(['active', 'icon'])

@php
    $classes = $active ?? false ? 'inline-flex items-center bg-indigo-50 rounded-lg my-2 px-2 pt-1 text-sm font-medium leading-5 text-gray-900 focus:outline-none transition duration-150 ease-in-out' : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out';
    $icons = $icon ?? false ? 'mr-2 text-gray-700 fa-solid fa-' . $icon : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <i {{ $attributes->merge(['class' => $icons]) }}></i>
    {{ $slot }}
</a>
