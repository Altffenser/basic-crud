{{--        Enlist posts from user--}}
<div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full">
        <div class="p-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h4 class="text-xl font-bold dark:text-white">Posts</h4>
            @icon('files text-dark dark:text-white text-2xl')
        </div>
        @foreach($user->posts->take(10) as $post)
            <li class="flex space-x-1.5 items-center dark:odd:bg-gray-700 last:rounded-b p-2">
                <div class="relative w-10 h-10 flex justify-center items-center overflow-hidden bg-gradient-to-br from-transparent to-category-{{ $post->category->color }}/50 rounded-full text-2xl">
                        <i class="ti ti-{{ $post->category->icon }} text-category-{{  $post->category->color }}"></i>
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ $post->title }}</a>
                    <span class="text-[8pt] text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
