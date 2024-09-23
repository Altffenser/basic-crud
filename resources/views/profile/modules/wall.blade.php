@auth
<form method="POST" action="{{ route('publications.store', ['published_at' => $user->id, 'user_id' => Auth::user()->id]) }}" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
            <label for="content" class="sr-only">Your comment</label>
            <textarea id="content" name="content" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
        </div>
        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
            <x-button color="blue">
                Send post
            </x-button>
        </div>
    </div>
</form>
@endauth

<div class="mb-5">
    <h3 class="text-2xl font-bold leading-tight text-black dark:text-white mb-5">Actividad y publicaciones</h3>
    {{--        Enlist posts from user--}}
    <ol class="mt-3 divide-y divider-gray-200 dark:divide-gray-700">
        @foreach($user->allPublications($user)->reverse() as $publication)
            <div class="bg-white w-full rounded-md shadow-md h-auto py-2 px-3 my-5 dark:bg-gray-800">
                <div class="w-full h-16 flex items-center justify-between ">
                    <div class="flex">
                        <img class=" rounded-full w-10 h-10 mr-3" src="{{ $publication->user_id->profile->photo }}" alt="{{ $publication->user_id->profile->username }} image">
                        <div>
                            @if($publication->user_id->id !== $publication->published_at->id)
                                {{--                                If the publication is at other user's wall, show the user's name and the publication's published_at name--}}
                                <h3 class="font-medium text-gray-900 dark:text-white flex items-center space-x-1"><a href="{{ route('profile.show', ['user' => $publication->user_id]) }}" class="hover:underline">{{ $publication->user_id->name }}</a> @icon('caret-right-filled text-black dark:text-white') <a href="{{ route('profile.show', ['user' => $publication->published_at]) }}" class="hover:underline">{{ $publication->published_at->name }}</a></h3>
                            @else
                                {{--                                If the publication is at the user's wall, show the user's name--}}
                                <h3 class="font-medium text-gray-900 dark:text-white"><a href="{{ route('profile.show', ['user' => $publication->user_id]) }}" class="hover:underline">{{ $publication->user_id->name }}</a></h3>
                            @endif
                            <p class="text-xs text-gray-500">{{ $publication->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <svg class="w-16" xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" fill="none" stroke="#b0b0b0" stroke-width="2" stroke-linecap="square" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="1"></circle>
                        <circle cx="19" cy="12" r="1"></circle>
                        <circle cx="5" cy="12" r="1"></circle>
                    </svg>
                </div>
                <p class="dark:text-white">{{ $publication->content }}</p>
                <div class="w-full h-8 flex items-center px-3 my-3">
                    @if($publication->likers()->count() > 0)
                        <img class="x16dsc37" height="18" role="presentation" width="18"
                             src="data:image/svg+xml,%3Csvg fill='none' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath d='M16.0001 7.9996c0 4.418-3.5815 7.9996-7.9995 7.9996S.001 12.4176.001 7.9996 3.5825 0 8.0006 0C12.4186 0 16 3.5815 16 7.9996Z' fill='url(%23paint0_linear_15251_63610)'/%3E%3Cpath d='M16.0001 7.9996c0 4.418-3.5815 7.9996-7.9995 7.9996S.001 12.4176.001 7.9996 3.5825 0 8.0006 0C12.4186 0 16 3.5815 16 7.9996Z' fill='url(%23paint1_radial_15251_63610)'/%3E%3Cpath d='M16.0001 7.9996c0 4.418-3.5815 7.9996-7.9995 7.9996S.001 12.4176.001 7.9996 3.5825 0 8.0006 0C12.4186 0 16 3.5815 16 7.9996Z' fill='url(%23paint2_radial_15251_63610)' fill-opacity='.5'/%3E%3Cpath d='M7.3014 3.8662a.6974.6974 0 0 1 .6974-.6977c.6742 0 1.2207.5465 1.2207 1.2206v1.7464a.101.101 0 0 0 .101.101h1.7953c.992 0 1.7232.9273 1.4917 1.892l-.4572 1.9047a2.301 2.301 0 0 1-2.2374 1.764H6.9185a.5752.5752 0 0 1-.5752-.5752V7.7384c0-.4168.097-.8278.2834-1.2005l.2856-.5712a3.6878 3.6878 0 0 0 .3893-1.6509l-.0002-.4496ZM4.367 7a.767.767 0 0 0-.7669.767v3.2598a.767.767 0 0 0 .767.767h.767a.3835.3835 0 0 0 .3835-.3835V7.3835A.3835.3835 0 0 0 5.134 7h-.767Z' fill='%23fff'/%3E%3Cdefs%3E%3CradialGradient id='paint1_radial_15251_63610' cx='0' cy='0' r='1' gradientUnits='userSpaceOnUse' gradientTransform='rotate(90 .0005 8) scale(7.99958)'%3E%3Cstop offset='.5618' stop-color='%230866FF' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%230866FF' stop-opacity='.1'/%3E%3C/radialGradient%3E%3CradialGradient id='paint2_radial_15251_63610' cx='0' cy='0' r='1' gradientUnits='userSpaceOnUse' gradientTransform='rotate(45 -4.5257 10.9237) scale(10.1818)'%3E%3Cstop offset='.3143' stop-color='%2302ADFC'/%3E%3Cstop offset='1' stop-color='%2302ADFC' stop-opacity='0'/%3E%3C/radialGradient%3E%3ClinearGradient id='paint0_linear_15251_63610' x1='2.3989' y1='2.3999' x2='13.5983' y2='13.5993' gradientUnits='userSpaceOnUse'%3E%3Cstop stop-color='%2302ADFC'/%3E%3Cstop offset='.5' stop-color='%230866FF'/%3E%3Cstop offset='1' stop-color='%232B7EFF'/%3E%3C/linearGradient%3E%3C/defs%3E%3C/svg%3E"
                             alt="">
                    @endif

                    <div class="w-full flex justify-between">
                        <p class="ml-1.5 text-gray-500">{{ $publication->likers()->count() > 0 ? $publication->likers()->count() : "" }}</p>
                        <p class="ml-1.5 text-gray-500 text-sm">{{ $publication->comments()->count() > 0 ? $publication->comments()->count() : "" }} {{ $publication->comments()->count() > 0 ? ($publication->comments()->count() == 1 ? " Comentario" : " Comentarios") : "" }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-3 w-full py-2 border-t border-gray-700">
                    <form method="POST" action="{{ route('resource.like.store', ['model' => 'App\Models\Publication', 'id' => $publication->id]) }}">
                        @csrf
                        @method('POST')
                        {{--                        TODO: Fix the like button--}}
                        @if($publication->isLikedBy(Auth::user() ?? App\Models\User::find(1)))
                            <button type="submit" class="flex flex-row justify-center items-center w-full space-x-1.5 hover:bg-white/10 rounded-md py-2">
                                @icon('thumb-up-filled text-[#1a75ff]')
                                <span class="font-semibold text-sm text-[#1a75ff]">Like</span>
                            </button>
                        @else
                            <button type="submit" class="flex flex-row justify-center items-center w-full space-x-1.5 hover:bg-white/10 rounded-md py-2">
                                @icon('thumb-up text-gray-400')
                                <span class="font-semibold text-sm text-gray-400">Like</span>
                            </button>
                        @endif
                    </form>
                    <button class="flex flex-row justify-center items-center w-full space-x-3 hover:bg-white/10 rounded-md py-2">
                        @icon('message text-gray-400')
                        <span class="font-semibold text-sm text-gray-400">Comentar</span></button>
                    <button class="flex flex-row justify-center items-center w-full space-x-3 hover:bg-white/10 rounded-md py-2">
                        @icon('share text-gray-400')
                        <span class="font-semibold text-sm text-gray-400">Compartir</span></button>
                </div>

                <div class="border-t border-gray-700 py-2">
                    <p class="font-semibold text-sm text-gray-400 my-3">Ver más respuestas</p>
                    @foreach($publication->comments as $comment)
                        <div class="flex items-center space-x-2 mb-5">
                            <div class="flex flex-shrink-0 self-start cursor-pointer">
                                <img src="{{ $comment->user->profile->photo }}" alt="" class="h-8 w-8 object-cover rounded-full">
                            </div>
                            <div class="flex items-center justify-center space-x-2">
                                <div class="block">
                                    <div class="bg-gray-100 dark:bg-gray-700 w-auto rounded-xl px-2 pb-2">
                                        <div class="font-medium">
                                            <a href="#" class="hover:underline text-sm font-semibold dark:text-gray-200">
                                                <small>{{ $comment->user->name }}</small>
                                            </a>
                                        </div>
                                        <div class="text-xs dark:text-gray-200">
                                            {{ $comment->content }}
                                        </div>
                                    </div>
                                    <div class="flex justify-start items-center text-xs w-full">
                                        <div class="font-semibold text-gray-700 dark:text-gray-200 px-2 flex items-center justify-center space-x-1">
                                            <a href="#" class="hover:underline">
                                                <small>Like</small>
                                            </a>
                                            <small class="self-center">.</small>
                                            <a href="#" class="hover:underline">
                                                <small>Reply</small>
                                            </a>
                                            <small class="self-center">.</small>
                                            <a href="#" class="hover:underline">
                                                <small>{{ $comment->created_at->diffForHumans() }}</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="self-stretch flex justify-center items-center transform transition-opacity duration-200 opacity-0 translate -translate-y-2 hover:opacity-100">
                                <a href="#" class="">
                                    <div class="text-xs cursor-pointer flex h-6 w-6 transform transition-colors duration-200 hover:bg-gray-100 rounded-full items-center justify-center">
                                        <svg class="w-4 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <form method="POST" action="{{ route('resource.comments.store', ['model' => 'App\Models\Publication', 'id' => $publication->id]) }}">
                        @csrf
                        @method('POST')
                        <label for="content" class="sr-only">Your message</label>
                        <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <button type="button" class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                    <path fill="currentColor" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"/>
                                </svg>
                                <span class="sr-only">Upload image</span>
                            </button>
                            <button type="button" class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z"/>
                                </svg>
                                <span class="sr-only">Add emoji</span>
                            </button>
                            <textarea id="content" name="content" rows="1" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                            <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                                <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
                                </svg>
                                <span class="sr-only">Send message</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </ol>

</div>
