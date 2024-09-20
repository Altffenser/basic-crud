<div class="p-3">
    @auth
        @if($post->user->id !== Auth::user()->id)
            @if(!$post->alreadyPointed(Auth::user()))
                @if(Auth::user()->availablePoints() <= 10)
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        @for($i = 0; $i < Auth::user()->availablePoints(); $i++)
                            @if($i == 0)
                                <form method="POST" action="{{ route('post.points.store', ['post' => $post, 'points' => ($i + 1)]) }}">
                                    @csrf
                                    <button type="submit" name="points" value="{{ ($i + 1) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        {{ $i + 1 }}
                                    </button>
                                </form>
                            @endif
                            @if($i > 0 && $i < (auth()->user()->availablePoints() - 1))
                                <form method="POST" action="{{ route('post.points.store', ['post' => $post, 'points' => ($i + 1)]) }}">
                                    @csrf
                                    <button type="submit" name="points" value="{{ ($i + 1) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        {{ $i + 1 }}
                                    </button>
                                </form>
                            @endif
                            @if($i == (auth()->user()->availablePoints()) - 1)
                                <form method="POST" action="{{ route('post.points.store', ['post' => $post, 'points' => ($i + 1)]) }}">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                                        {{ $i + 1 }}
                                    </button>
                                </form>
                            @endif
                        @endfor
                    </div>
                    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Tienes {{ Auth::user()->availablePoints() }} puntos disponibles.</p>
                @endif
                @if(Auth::user()->availablePoints() > 15)
                    <form method="POST" action="{{ route('post.points.store', ['post' => $post]) }}">
                        @csrf
                        <label for="quantity-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dar puntos:</label>
                        <div class="flex space-x-2 justify-start items-center">
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                    </svg>
                                </button>
                                <input type="text" id="quantity-input" name="points" data-input-counter data-input-counter-min="1" data-input-counter-max="{{ Auth::user()->availablePoints() }}" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ Auth::user()->availablePoints() }}" required/>
                                <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                    </svg>
                                </button>
                            </div>
                            <button type="submit" class="flex space-x-2 items-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 12l5 5l10 -10"/>
                                </svg>
                                <small>Dar puntos</small>
                            </button>
                        </div>
                        <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Tienes {{ Auth::user()->availablePoints() }} puntos disponibles.</p>
                    </form>
                @endif
            @else
                <p class="text-green-500 text-sm mt-2">{{ __("You have already given points to this post") }}</p>
            @endif
        @else
            <p class="text-blue-500 text-sm mt-2">{{ __("You can't give points to your own Posts.") }}</p>
        @endif
    @endauth
    @guest
        <p class="text-red-500 text-sm mt-2">{{ __("You must be logged in to give points") }}</p>
    @endguest
</div>
