@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center px-3 py-2 text-[#323ee2] transition-colors duration-300 transform border-r-[4px]
                bg-blue-50 border-[#165eef]'
                : 'flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform hover:bg-blue-50
                hover:text-gray-800 border-r-[4px] border-white hover:border-[#165eef]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
