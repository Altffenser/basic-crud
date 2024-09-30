<div class="mt-5">
    <h2 class="font-bold text-lg mb-2 dark:text-gray-300">{{ __("Comments") }}:</h2>
    <div>
        <form action="{{ route('resource.comments.store', ['model' => 'App\Models\Post', 'id' => $post->id]) }}"
              method="POST">
            @csrf
            <div class="w-full mb-4 border border-gray-200 rounded bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
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
    @forelse($post->comments as $comment)
        <div class="px-6 py-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-600">
            <div class="flex items-center mb-6">
                <img src="{{ $comment->user->profile->photo }}" alt="Avatar" class="w-12 h-12 rounded-full mr-4">
                <div>
                    <div class="font-bold text-blue-600 dark:text-gray-300 hover:underline">{{ $comment->user->name }}</div>
                    <div class="text-xs font-thin text-blue-600 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
            <p class="text-lg leading-relaxed mb-6 text-blue-600 dark:text-gray-300">
                {!! $comment->content !!}
            </p>
            <div class="flex justify-between items-center">
                <div>
                    <a href="#" class="text-gray-500 hover:text-gray-700 mr-4"><i class="far fa-thumbs-up"></i> Like</a>
                    <a href="#" class="text-gray-500 hover:text-gray-700"><i class="far fa-comment-alt"></i> Reply</a>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="#" class="text-gray-300 hover:text-gray-700">@icon('share mr-1') Share</a>
                    <a href="#" class="hover:text-gray-700 text-red-600">@icon('flag mr-1')  {{ __('posts.show.Report') }}</a>
                    @if($comment->user->id === auth()->id())
                        <form action="{{ route('resource.comments.destroy', ['comment' => $comment]) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('comments.form.Are you sure you want to delete this comment?') }}')">
                            @csrf
                            @method('DELETE')
                            <x-button color="red" type="submit">
                                @icon('trash mr-1.5')  {{ __('posts.show.Delete') }}
                            </x-button>
                        </form>
                        <x-button color="blue" href="#">
                            @icon('pencil mr-1.5')  {{ __('posts.show.Edit') }}
                        </x-button>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <p>{{ __("posts.comments.There are no comments for this post yet") }}</p>
    @endforelse
</div>
