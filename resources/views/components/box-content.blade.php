@props([
    'title' => null,
    'icon' => 'info-circle',
    'iconColor' => 'blue',
])

@php
    $iconColor = match($iconColor) {
        'green' => 'text-green-500',
        'red' => 'text-red-500',
        'yellow' => 'text-yellow-500',
        'blue' => 'text-blue-500',
        'gray' => 'text-gray-500',
        'indigo' => 'text-indigo-500',
        'purple' => 'text-purple-500',
        'pink' => 'text-pink-500',
        'teal' => 'text-teal-500',
        'cyan' => 'text-cyan-500',
        'white' => 'text-white',
    };

@endphp

<div {{ $attributes->merge(['class' => 'flex flex-row bg-white rounded-lg shadow dark:bg-gray-800 mb-5 border border-gray-200 dark:border-gray-600']) }}>
    <ul class="flex flex-col w-full">
        <div class="p-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h3 class="text-md font-bold dark:text-white">{{ $title }}</h3>

            @icon($icon . ' text-xl ' . $iconColor)
        </div>
        <div class="p-2">

            {{ $slot }}

            @if($slot->isEmpty())
                <div class="p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    Ningún recurso encontrado en {{ $title }}.
                </div>
            @endif
        </div>
    </ul>
</div>
