<x-box-module title="Posts relacionados">
    @foreach($related as $post)
        <li class="flex space-x-1.5 items-center dark:odd:bg-gray-700 last:rounded-b p-2">
            <div class="relative w-10 h-10 flex justify-center items-center overflow-hidden bg-gradient-to-br from-transparent to-category-{{ $post->category->color }}/50 rounded-full text-2xl">
                <i class="ti ti-{{ $post->category->icon }} text-category-{{  $post->category->color }}"></i>
            </div>
            <div class="flex flex-col">
                <a href="{{ route('posts.show', ['post' => $post]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ $post->title }}</a>
                <span class="text-[8pt] text-gray-400">{{ $post->category->title }}</span>
            </div>
        </li>
    @endforeach
</x-box-module>
