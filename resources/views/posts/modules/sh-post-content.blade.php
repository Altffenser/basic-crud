<div class="mb-4 md:mb-0 w-full relative rounded-t overflow-hidden" style="height: 24em;">
    <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
    <img src="{{ $post->image }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" alt="Post cover image"/>
    <div class="p-4 absolute bottom-0 left-0 z-20">
        <a href="#" class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">@icon($post->category->icon . ' mr-3') {{ $post->category_title }}</a>
        <h2 class="text-4xl font-semibold text-gray-100 leading-tight">{{ $post->title }}</h2>
        <div class="flex mt-3">
            <img src="{{ $post->user->profile->photo }}" alt="{{ $post->user->name }}'s photo" class="h-10 w-10 rounded-full mr-2 object-cover"/>
            <div>
                <p class="font-semibold text-gray-200 text-sm"> {{ $post->user->name }} </p>
                <p class="font-semibold text-gray-400 text-xs"> {{ optional($post->published_at)->format('M d, Y h:i a') }} </p>
            </div>
        </div>
    </div>
</div>
<div class="px-3 py-4 bg-white dark:bg-gray-800 backdrop-blur-2xl backdrop-opacity-50">

    <div class="trix-content prose-lg text-md dark:text-white">
        {!! $post->content !!}
    </div>

    <div class="px-3 py-4">
        <x-box-module title="Tags">
            @include('posts.modules.sh-post-tags')
        </x-box-module>

        @include('posts.modules.sh-post-metadata')
    </div>
</div>
