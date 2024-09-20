<div class="mb-4 md:mb-0 w-full relative rounded-t overflow-hidden" style="height: 24em;">
    <div class="absolute left-0 bottom-0 w-full h-full z-10" style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
    <img src="{{ $post->image }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" alt="Post cover image"/>
    <div class="p-4 absolute bottom-0 left-0 z-20">
        <a href="#" class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">{{ $post->category_title }}</a>
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
<div class="px-3 py-4 bg-white dark:bg-gray-800">

    <div class="trix-content prose-lg text-md dark:text-white">
        {!! $post->content !!}
    </div>

    <div class="px-3 py-4">
        <x-box-module title="Tags">
            @include('posts.modules.sh-post-tags')
        </x-box-module>
        <div class="bg-gray-100 p-4 dark:bg-gray-900 rounded shadow">
            <div class="flex justify-between items-center mb-6 border-b dark:border-gray-800">
                <div>
                    {{--                    Modulo de puntos--}}
                    @include('posts.modules.sh-points')
                </div>
                {{--                Info de puntos del post--}}
                <div class="flex space-x-5 items-center">
                    @icon('coins text-[32px] dark:text-white')
                    <div class="flex flex-col">
                        <h2 class="text-4xl font-extrabold dark:text-white text-blue-600">{{ $post->points }}</h2>
                        <span class="text-gray-500 uppercase text-[12px]">Puntos</span>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-end space-x-10">
                {{--                Boton de favoritos--}}
                @auth
                    <div class="flex">
                        <div>
                            @if(!$post->isFavorite())
                                <form method="POST" action="{{ route('post.favorite.store', ['post' => $post]) }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900 flex items-center space-x-2">
                                        @icon('star text-[24px]')
                                        <span>Agregar a favoritos</span>
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('post.favorite.destroy', ['post' => $post]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 flex items-center space-x-2">
                                        @icon('star-off text-[24px]')
                                        <span>Quitar de favoritos</span>
                                    </button>
                                </form>
                            @endif
                        </div>
                        <div>
                            <form method="POST" action="{{ route('resource.like.store', ['id' => $post->id, 'model' => 'App\Models\Post']) }}">
                                @method('POST')
                                @csrf
                                @if(!$post->isLikedBy(Auth::user()))
                                    <button type="submit" class="focus:outline-none text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-blue-900 flex items-center space-x-2">
                                        @icon('thumb-up text-[24px]')
                                        <span>Like</span>
                                    </button>
                                @else
                                    <button type="submit" class="focus:outline-none text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-blue-900 flex items-center space-x-2">
                                        @icon('thumb-up-filled text-[24px]')
                                        <span>Unlike</span>
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                @endauth
                <div class="flex justify-end space-x-10">
                    {{--                Posts visitors counter--}}
                    <div class="text-center">
                        <div class="flex items-center space-x-2">
                            @icon('eye-star text-[24px] dark:text-white')
                            <span class="font-bold text-lg dark:text-white">{{ $post->visitors()->uniqueCount() }}</span>
                        </div>
                        <span class="uppercase text-gray-500 text-[10px]">Visitas</span>
                    </div>

                    {{--                Post Favorites Counter--}}
                    <div class="text-center">
                        <div class="flex items-center space-x-2">
                            @icon('star text-[24px] dark:text-white')
                            <span class="font-bold text-lg dark:text-white">{{ $post->favorites()->count() }}</span>
                        </div>
                        <span class="uppercase text-gray-500 text-[10px]">Favoritos</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
