<div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full">
        <div class="p-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h4 class="text-xl font-bold dark:text-white">TOP Posts</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z"/>
            </svg>
        </div>
        @forelse ($topPosts as $post)
            <li class="flex justify-between dark:odd:bg-gray-700 last:rounded-b p-2">
                <div class="flex items-center space-x-1.5">
                    <div class="mx-2">
                        <h4 class="text-lg font-bold dark:text-white">{{ $loop->index + 1 }}</h4>
                    </div>
                    <div class="flex flex-col">
                        <a href="{{ route('profile.show', ['user' => $post->user]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ Str::limit($post->title, 25) }}</a>
                        <span class="text-[8pt] text-gray-400">{{ $post->created_at->diffForHumans() }} &centerdot; {{ $post->user->name }}</span>
                    </div>
                </div>
                <div class="mx-2">
                    <h4 class="text-sm font-bold dark:text-white">{{ Number::format($post->points) }}</h4>
                </div>
            </li>
        @empty
            <li>No comments found</li>
        @endforelse
    </ul>
</div>
