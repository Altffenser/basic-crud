<div>
    <div>
        <form action="{{ route('post.comments.store', ['post' => $post, 'user' => App\Models\User::find(1)]) }}"
              method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="flex flex-col space-y-2 gap-x-4">
                <textarea name="content" class="w-full" rows="3"></textarea>
                <div class="flex justify-end">
                    <x-button>
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
