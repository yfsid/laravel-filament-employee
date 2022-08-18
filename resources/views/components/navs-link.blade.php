@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center px-4 pt-1 border-b-4 border-warning-700 text-md font-medium leading-5 text-warning-50 focus:outline-none focus:text-blue-900 focus:border-blue-900 transition duration-150 ease-in-out'
: 'inline-flex items-center px-4 pt-1 border-b-4 border-transparent text-md font-medium leading-5 text-gray-100 hover:text-warning-700 hover:border-warning-700 focus:outline-none focus:text-blue-900 focus:border-blue-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
