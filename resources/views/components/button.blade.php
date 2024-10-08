@props([
    'color' => 'zinc',
    'href' => null,
])

@php
    $class = implode(' ', [
        'font-medium rounded-md text-sm px-5 py-2.5 shadow-md flex items-center space-x-1.5 border',
        // focus
        'focus:ring-4 focus:outline-none',
    ]);
    $colorClass = [
        'blue' => implode(' ', [
            'text-white bg-blue-700 dark:bg-blue-600 border-blue-900 dark:border-blue-600',
            // hover
            'hover:bg-blue-800 dark:hover:bg-blue-700',
            // focus
            'focus:ring-blue-300 dark:focus:ring-blue-800',
        ]),
        'green' => implode(' ', [
            'text-white bg-green-700 dark:bg-green-600 border-green-900 dark:border-green-600',
            // hover
            'hover:bg-green-800 dark:hover:bg-green-700',
            // focus
            'focus:ring-green-300 dark:focus:ring-green-800',
        ]),
        'red' => implode(' ', [
            'text-white bg-red-700 dark:bg-red-600 border-red-900 dark:border-red-600',
            // hover
            'hover:bg-red-800 dark:hover:bg-red-700',
            // focus
            'focus:ring-red-300 dark:focus:ring-red-800',
        ]),
        'yellow' => implode(' ', [
            'text-white bg-yellow-400',
            // hover
            'hover:bg-yellow-500 dark:hover:bg-yellow-700',
            // focus
            'focus:ring-yellow-300 dark:focus:ring-yellow-900',
        ]),
        'zinc' => implode(' ', [
            'text-white bg-stone-400 border-stone-900 dark:border-stone-600',
            // hover
            'hover:bg-stone-500 dark:hover:bg-stone-700',
            // focus
            'focus:ring-stone-300 dark:focus:ring-stone-800',
        ]),
    ][$color];
@endphp

@isset($href)
    <a {{ $attributes->merge(['class' => "$class $colorClass"]) }} href="{{ $href }}">
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => "$class $colorClass"]) }}>
        {{ $slot }}
    </button>
@endisset
