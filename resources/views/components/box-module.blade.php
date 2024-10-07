@props([
    'title' => $title,
    'subtitle' => null,
    'subtitleClasses' => 'bg-gradient-to-r from-violet-600 to-sky-500 bg-clip-text text-transparent',
    'href' => null,
    'icon' => 'info-circle',
    'iconClasses' => 'bg-gradient-to-r from-violet-600 to-sky-500 text-white',
])
<div class="mb-5">
    @isset($href)
        <div class="rounded">
            <div class="flex items-center justify-between p-2">
                <div class="flex flex-col">
                    <a href="{{ $href }}" class="text-md font-semibold text-gray-600 dark:text-blue-500 hover:underline">{{ $title }}</a>
                    <span class="text-xs font-medium {{ $subtitleClasses }}">{{ $subtitle }}</span>
                </div>
                <div class="flex items-center justify-center w-10 h-10 rounded-full {{ $iconClasses }}" data-tooltip-target="tooltip--user-range">
                    @icon($icon)
                </div>
                <div id="tooltip--user-range" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    {{ $subtitle }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div class="p-2">
                {{ $slot }}
            </div>
        </div>
    @else
        <h2 class="text-lg font-bold text-gray-600 dark:text-blue-500 mb-5">
            <span class="">{{ $title }}</span>
        </h2>
        <div>
            {{ $slot }}
        </div>
    @endisset
</div>
