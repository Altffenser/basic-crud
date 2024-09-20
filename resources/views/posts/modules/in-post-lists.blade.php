<div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full dark:text-gray-300">
        @forelse ($posts as $post)
            <li class="flex space-x-1.5 items-center border-b border-gray-200 dark:border-gray-700 last:border-0 w-full p-3">
                <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 22">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                </svg>
                <div class="flex flex-col">
                    <a href="{{ route('posts.show', ['post' => $post]) }}" class="font-bold text-blue-600 dark:text-blue-500 hover:underline">{{ $post->title }}</a>
                    <div class="text-xs flex space-x-2.5">
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"/>
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"/>
                            </svg>
                            <span>{{ $post->visitors()->uniqueCount() }}</span>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                            </svg>
                            <a href="{{ route('profile.show', ['user' => $post->user]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ '@' . $post->user->profile->username }}</a>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/>
                                <path d="M12 7v5l3 3"/>
                            </svg>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-messages">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"/>
                                <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"/>
                            </svg>
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
