<div class="flex self-start gap-x-4">
    <x-button class="self-end" :href="route('posts.index')">
        {{ __('posts.show.View All') }}
    </x-button>
    <form action="{{ route('posts.featured', ['post' => $post]) }}" method="POST" class="inline">
        @csrf
        @method('PATCH')
        <x-button :color="$post->is_featured->buttonColor()" type="submit">
            {{ $post->is_featured->changeBtnLabel() }}
        </x-button>
    </form>
    <x-button color="blue" :href="route('posts.edit', ['post' => $post])">
        {{ __('posts.show.Edit') }}
    </x-button>
    <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST" class="inline"
          onsubmit="return confirm('{{ __('posts.form.Are you sure you want to delete this post?') }}')">
        @csrf
        @method('DELETE')
        <x-button color="red" type="submit">
            {{ __('posts.show.Delete') }}
        </x-button>
    </form>
</div>
