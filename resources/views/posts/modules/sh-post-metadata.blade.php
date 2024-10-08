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
            <div class="flex space-x-2.5">
                <div>
                    @if(!$post->isFavorite())
                        <form method="POST" action="{{ route('post.favorite.store', ['post' => $post]) }}">
                            @csrf
                            <x-button type="submit" color="yellow">
                                @icon('star text-[24px]')
                                <span>Agregar a favoritos</span>
                            </x-button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('post.favorite.destroy', ['post' => $post]) }}">
                            @csrf
                            @method('DELETE')
                            <x-button type="submit" color="red">
                                @icon('star-off text-[24px]')
                                <span>Quitar de favoritos</span>
                            </x-button>
                        </form>
                    @endif
                </div>
                <div>
                    <form method="POST" action="{{ route('resource.like.store', ['id' => $post->id, 'model' => 'App\Models\Post']) }}">
                        @method('POST')
                        @csrf
                        @if(!$post->isLikedBy(Auth::user()))
                            <x-button type="submit" color="blue">
                                @icon('thumb-up text-[24px]')
                                <span>Like</span>
                            </x-button>
                        @else
                            <x-button type="submit" color="blue">
                                @icon('thumb-up-filled text-[24px]')
                                <span>Liked</span>
                            </x-button>
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
