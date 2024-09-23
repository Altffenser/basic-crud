<x-box-content title="Últimos comentarios" icon="users text-purple-500">
    @foreach($comments as $comment)
        <li class="flex space-x-1.5 items-center dark:odd:bg-gray-700 odd:bg-gray-50 last:rounded-b">
            <div class="flex items-center space-x-1">
                <a class="text-[8pt] text-gray-400 hover:underline" href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ '@' . $comment->user->profile->username }}</a>
                <a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}" class="font-bold text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ Str::limit($comment->commentable->title, 30) }}</a>
            </div>
        </li>
    @endforeach
</x-box-content>
