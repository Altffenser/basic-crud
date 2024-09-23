<x-box-content title="TOP Posts" icon="crown text-yellow-500">
    @foreach($topPosts as $post)
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
    @endforeach
</x-box-content>
