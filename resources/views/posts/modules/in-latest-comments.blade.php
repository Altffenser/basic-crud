<div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full">
        <div class="p-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h4 class="text-xl font-bold dark:text-white">Últimos comentarios</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-messages">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"/>
                <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"/>
            </svg>
        </div>
        @forelse ($comments as $comment)
            <li class="flex space-x-1.5 items-center dark:odd:bg-gray-700 odd:bg-gray-50 last:rounded-b p-2">
                <div class="flex items-center space-x-1">
                    <a class="text-[8pt] text-gray-400 hover:underline" href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ '@' . $comment->user->profile->username }}</a>
                    <a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}" class="font-bold text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ Str::limit($comment->commentable->title, 30) }}</a>
                </div>
            </li>
        @empty
            <li>No comments found</li>
        @endforelse
    </ul>
</div>
