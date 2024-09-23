@props([
    'title' => null,
    'icon' => 'info-circle',
])

<div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full">
        <div class="p-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h3 class="text-md font-bold dark:text-white">{{ $title }}</h3>

            @icon($icon . ' text-xl')
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
