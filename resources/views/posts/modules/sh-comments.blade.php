<div class="mt-5">
    <div>
        <form action="{{ route('post.comments.store', ['post' => $post, 'user' => App\Models\User::find(1)]) }}"
              method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                    <label for="content" class="sr-only">Your comment</label>
                    <textarea id="content" name="content" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
                </div>
                <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                    <x-button color="blue">
                        {{ __('posts.comments.Add Comment') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>

    <h2 class="font-bold text-lg my-2">{{ __("Comments") }}:</h2>
    @forelse($post->comments as $comment)
        <div class="bg-gray-50 p-4 my-2 shadow-sm rounded-lg">
            <div class="flex justify-between">
                <div>
                    <a class="font-bold text-blue-600 hover:underline"
                       href="{{ route('profile.show', ['user' => $comment->user]) }}">{{ $comment->user->name }}</a>
                    <span class="text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <div>
                    @if($comment->user->id === auth()->id())
                        <form action="{{ route('post.comments.destroy', ['comment' => $comment]) }}" method="POST"
                              class="inline"
                              onsubmit="return confirm('{{ __('comments.form.Are you sure you want to delete this comment?') }}')">
                            @csrf
                            @method('DELETE')
                            <x-button color="red" type="submit">
                                {{ __('posts.show.Delete') }}
                            </x-button>
                        </form>
                    @endif
                </div>
            </div>
            <p class="text-gray-700 mt-2">{!! $comment->content !!}</p>
        </div>
    @empty
        <p>{{ __("posts.comments.There are no comments for this post yet") }}</p>
    @endforelse
</div>
