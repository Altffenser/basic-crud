<div class="flex flex-col bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full dark:text-gray-300">
        @forelse ($posts as $post)
            <li class="flex flex-row space-x-1.5 items-center border-b border-gray-200 dark:border-gray-700 last:border-0 w-full p-3">
                <div class="flex flex-col items-center text-center mr-3 min-w-16">
                    <div class="relative w-10 h-10 flex justify-center items-center overflow-hidden bg-gradient-to-br from-transparent to-category-{{ $post->category->color }}/50 rounded-full text-2xl">
                        <i class="ti ti-{{ $post->category->icon }} text-category-{{  $post->category->color }}"></i>
                    </div>
                    <div class="z-10 inline-block text-[8px] uppercase font-medium text-gray-400 rounded-lg shadow-sm">
                        {{ $post->category->title }}
                    </div>
                </div>
                <div class="flex flex-col space-y-1.5">
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="font-bold text-blue-600 dark:text-gray-300 hover:underline">{{ $post->title }}</a>
                    <div class="text-xs flex space-x-2.5">
                        <div class="flex space-x-1 items-center">
                            @icon('eye text-[16px] dark:text-gray-400')
                            <span>{{ $post->visitors()->uniqueCount() }}</span>
                        </div>
                        <div class="flex space-x-1 items-center">
                             @icon('user text-[16px] dark:text-gray-400')
                            <a href="{{ route('profile.show', ['user' => $post->user]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ '@' . $post->user->profile->username }}</a>
                        </div>
                        <div class="flex space-x-1 items-center">
                             @icon('clock text-[16px] dark:text-gray-400')
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex space-x-1 items-center">
                             @icon('messages text-[16px] dark:text-gray-400')
                            <span>{{ $post->comments()->count() }}</span>
                        </div>
                    </div>
                </div>
            </li>
        @empty
            <li>No posts found.</li>
        @endforelse
    </ul>

    @if ($posts->hasPages())
        <tfoot>
        <tr>
            <td colspan="7">
                <div class="p-2">
                    {{ $posts->links() }}
                </div>
            </td>
        </tr>
        </tfoot>
    @endif
</div>
