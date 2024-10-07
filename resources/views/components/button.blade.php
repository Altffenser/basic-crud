@props([
    'color' => 'zinc',
    'href' => null,
])

@php
$class = implode(' ', [
    'font-medium rounded-lg text-sm px-5 py-2.5 shadow',
    // focus
    'focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800',
]);
$colorClass = [
    'blue' => implode(' ', [
        'text-white bg-blue-700 dark:bg-blue-600',
        // hover
        'hover:bg-blue-800 dark:hover:bg-blue-700'
    ]),
    'green' => implode(' ', [
        'text-white [--button-background-color:theme(colors.green.600)] [--button-border-color:theme(colors.green.700/80%)]',
        // hover
        'hover:[--button-background-color:theme(colors.green.600/90%)]'
    ]),
    'red' => implode(' ', [
        'text-white [--button-background-color:theme(colors.red.600)] [--button-border-color:theme(colors.red.700/80%)]',
        // hover
        'hover:[--button-background-color:theme(colors.red.600/90%)]'
    ]),
    'yellow' => implode(' ', [
        'text-yellow-950 [--button-background-color:theme(colors.yellow.300)] [--button-border-color:theme(colors.yellow.400/80%)]',
        // hover
        'hover:[--button-background-color:theme(colors.yellow.300/90%)]'
    ]),
    'zinc' => implode(' ', [
        'text-white [--button-background-color:theme(colors.zinc.600)] [--button-border-color:theme(colors.zinc.700/80%)]',
        // hover
        'hover:[--button-background-color:theme(colors.zinc.600/90%)]'
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
