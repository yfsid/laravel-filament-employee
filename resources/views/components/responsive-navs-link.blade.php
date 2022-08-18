@props(['active'])

@php
$classes = ($active ?? false)
? 'block pl-3 pr-4 py-2 border-l-4 border-warning-700 text-base font-medium text-gray-100 hover:text-gray-900 hover:bg-primary-50 hover:border-gray-300 focus:outline-none focus:text-blue-900 focus:bg-primary-100 focus:border-blue-900 transition duration-150 ease-in-out'
: 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-100 hover:text-gray-900 hover:bg-primary-50 hover:border-gray-300 focus:outline-none focus:text-blue-900 focus:bg-primary-100 focus:border-blue-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
