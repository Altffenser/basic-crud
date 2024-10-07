<div class="flex flex-col">
    <div class="flex flex-col justify-center">
        <x-box-module title="{{ '@' . $post->user->profile->username }}" href="{{ route('profile.show', ['user' => $post->user]) }}"
                      icon="{{ $post->user->roles->first()->icon }} text-2xl"
                      subtitle="{{ $post->user->roles->first()->display_name }}"
                      subtitle-classes="text-{{ $post->user->roles->first()->color }}-500"
                      icon-classes="bg-{{ $post->user->roles->first()->color }}-500 text-white"
            >
            <div class="grid sm:gap-x-2 sm:grid-cols-7 sm:text-left auto-cols-max items-start">
                <div class="col-span-4">
                    <img class="w-44 rounded shadow" src="{{ $post->user->profile->photo }}" alt="">
                </div>
                <div class="col-span-3 h-full">
                    <div class="flex flex-col h-full place-content-between">
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-1.5 dark:text-white">
                                @icon('eye text-[20px]')
                                <span class="font-bold">{{ Number::format($post->user->followers()->count()) }}</span>
                            </div>
                            <small class="text-slate-400">Seguidores</small>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-1.5 dark:text-white">
                                @icon('files text-[20px]')
                                <span class="font-bold">{{ Number::format($post->user->posts()->count()) }}</span>
                            </div>
                            <small class="text-slate-400">Posts</small>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex items-center space-x-1.5 dark:text-white">
                                @icon('coins text-[20px]')
                                <span class="font-bold">{{ Number::format($post->user->points()) }}</span>
                            </div>
                            <small class="text-slate-400">Puntos</small>
                        </div>
                        <div class="flex justify-around gap-2">
                            {{-- Follow button --}}
                            @auth
                                @if(auth()->user()->id !== $post->user->id)
                                    @if(!auth()->user()->isFollowing($post->user))
                                        <form method="POST" action="{{ route('profile.follow', ['user' => $post->user]) }}">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="shadow-sm shadow-sky-100 text-blue-600 border border-blue-200 bg-gradient-to-br from-blue-50 to-slate-200 focus:ring-4 focus:ring-blue-300 font-medium rounded text-sm px-5 py-1.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800 w-full flex items-center">
                                                @icon('eye-plus text-[24px]')
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('profile.unfollow', ['user' => $post->user]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="shadow shadow-red-300 focus:outline-none text-white border border-red-700 bg-gradient-to-br from-rose-400 to-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded text-sm px-5 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full flex items-center">
                                                @icon('eye-minus text-[24px]')
                                            </button>
                                        </form>
                                    @endif
                                @endif
                                <button type="button" class="text-xs text-white bg-gradient-to-r from-indigo-400 to-cyan-400 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded w-full px-2.5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Mensaje
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </x-box-module>

        <div class="relative border border-blue-500 py-1.5 px-1 rounded text-center">
            <div class="left-1/2 absolute top-[-17px] transform -translate-x-1/2 translate-y-1/2 -rotate-45 w-4 h-4 bg-white dark:bg-gray-800 border-t border-r border-blue-500"></div>
            <span class="italic text-blue-500 text-sm">{{ $post->user->profile->bio }}</span>
        </div>

        <div class="divide my-2"></div>

        <div class="text-slate-600 dark:text-slate-400">
            <div class="px-2 py-1">
                <span>@icon('map-pin-filled')</span>
                <span> de {{ $post->user->profile->country }}</span>
            </div>
            <div class="px-2 py-1">
                <span>@icon('buildings')</span>
                <span>vive en {{ $post->user->profile->city }}</span>
            </div>
            <div class="px-2 py-1">
                <span>@icon('brand-github')</span>
                <span> <a class="hover:underline" target="_blank" href="{{ $post->user->profile->github }}">Github</a></span>
            </div>
            <div class="px-2 py-1">
                <span>@icon('brand-facebook')</span>
                <span> <a class="hover:underline" target="_blank" href="{{ $post->user->profile->facebook }}">Facebook</a></span>
            </div>
        </div>
    </div>
</div>
