@php
    $class = implode(' ', [
        'appearance-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white',
        // focus
        'focus:ring-blue-500 focus:border-blue-500 block dark:focus:ring-blue-500 dark:focus:border-blue-50',
        // hover
        'hover:border-zinc-950/20',
    ]);
@endphp

<select {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</select>
