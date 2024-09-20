<x-box-module title="Posts relacionados">
    @foreach($related as $post)
        <li class="flex flex-col dark:odd:bg-gray-700 odd:bg-gray-50 last:rounded-b p-2">
            <small class="text-gray-400 uppercase text-[10px]">{{ $post->category->title }}</small>
            <a href="{{ route('posts.show', ['post' => $post]) }}" class="font-bold text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ Str::limit($post->title, 40) }}</a>
        </li>
    @endforeach
</x-box-module>
