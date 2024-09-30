<div class="bg-gray-100 p-4 dark:bg-gray-900 rounded shadow-2xl border border-gray-200 dark:border-gray-600">
    <div class="flex justify-between items-center mb-6 border-b dark:border-gray-800">
        <div>
            {{--                    Modulo de puntos--}}
            @include('posts.modules.sh-points')
        </div>
        {{--                Info de puntos del post--}}
        <div class="flex flex-col items-center text-center">
            <div class="flex items-center space-x-1.5">
                @icon('coins text-[28px] dark:text-white text-yellow-500')
                <h2 class="text-4xl dark:text-white text-gray-400 font-anton">{{ $post->points }}</h2>
            </div>
            <span class="text-gray-500 uppercase text-[12px]">Puntos</span>
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
