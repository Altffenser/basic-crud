@extends('layouts.app')
@section('title', $user->name)
@section('content')
    <!-- User Profile Tab Card -->
    <div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-5">
        <!-- Avatar Container -->
        <div class="relative">
            <!-- User Avatar -->
            <img class="w-40 h-40 rounded shadow object-cover" src="{{ $user->profile->photo }}" alt="{{ $user->name }}'s photo"/>
            <!-- Online Status Dot -->
            @if($user->isOnline())
                <div class="absolute -right-2 h-4 w-4 sm:top-2 rounded-full bg-green-400 sm:invisible md:visible border-2 border-white" title="User is online"></div>
            @else
                <div class="absolute -right-2 h-4 w-4 sm:top-2 rounded-full bg-red-500 sm:invisible md:visible border-2 border-white" title="User is offline"></div>
            @endif
        </div>

        <!-- Meta Body -->
        <div class="flex flex-col px-6">
            <!-- Username Container -->
            <div class="flex h-8 flex-row">
                <!-- Username -->
                <a href="https://github.com/EgoistDeveloper/" target="_blank">
                    <h2 class="text-lg font-semibold text-black dark:text-white">{{ $user->name }}</h2>
                </a>

                <!-- User Verified -->
                <svg class="my-auto ml-2 h-5 fill-blue-400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z"/>
                </svg>
            </div>

            <!-- Meta Badges -->
            <div class="my-2 flex flex-row space-x-2">
                <!-- Badge Role -->
                <div class="flex flex-row">
                    <svg class="mr-2 h-4 w-4 fill-gray-500/80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11A1.5,1.5 0 0,1 10.5,9.5A1.5,1.5 0 0,1 12,8A1.5,1.5 0 0,1 13.5,9.5A1.5,1.5 0 0,1 12,11Z"/>
                    </svg>
                    <div class="text-xs text-gray-400/80 hover:text-gray-400">{{ $user->profile->occupation }}</div>
                </div>

                <!-- Badge Location -->
                <div class="flex flex-row">
                    <svg class="mr-2 h-4 w-4 fill-gray-500/80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5M12,2A7,7 0 0,1 19,9C19,14.25 12,22 12,22C12,22 5,14.25 5,9A7,7 0 0,1 12,2M12,4A5,5 0 0,0 7,9C7,10 7,12 12,18.71C17,12 17,10 17,9A5,5 0 0,0 12,4Z"/>
                    </svg>

                    <div class="text-xs text-gray-400/80 hover:text-gray-400">{{ $user->profile->country }}</div>
                </div>

                <!-- Badge Email-->
                <div class="flex flex-row">
                    <svg class="mr-2 h-4 w-4 fill-gray-500/80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M12,15C12.81,15 13.5,14.7 14.11,14.11C14.7,13.5 15,12.81 15,12C15,11.19 14.7,10.5 14.11,9.89C13.5,9.3 12.81,9 12,9C11.19,9 10.5,9.3 9.89,9.89C9.3,10.5 9,11.19 9,12C9,12.81 9.3,13.5 9.89,14.11C10.5,14.7 11.19,15 12,15M12,2C14.75,2 17.1,3 19.05,4.95C21,6.9 22,9.25 22,12V13.45C22,14.45 21.65,15.3 21,16C20.3,16.67 19.5,17 18.5,17C17.3,17 16.31,16.5 15.56,15.5C14.56,16.5 13.38,17 12,17C10.63,17 9.45,16.5 8.46,15.54C7.5,14.55 7,13.38 7,12C7,10.63 7.5,9.45 8.46,8.46C9.45,7.5 10.63,7 12,7C13.38,7 14.55,7.5 15.54,8.46C16.5,9.45 17,10.63 17,12V13.45C17,13.86 17.16,14.22 17.46,14.53C17.76,14.84 18.11,15 18.5,15C18.92,15 19.27,14.84 19.57,14.53C19.87,14.22 20,13.86 20,13.45V12C20,9.81 19.23,7.93 17.65,6.35C16.07,4.77 14.19,4 12,4C9.81,4 7.93,4.77 6.35,6.35C4.77,7.93 4,9.81 4,12C4,14.19 4.77,16.07 6.35,17.65C7.93,19.23 9.81,20 12,20H17V22H12C9.25,22 6.9,21 4.95,19.05C3,17.1 2,14.75 2,12C2,9.25 3,6.9 4.95,4.95C6.9,3 9.25,2 12,2Z"/>
                    </svg>

                    <div class="text-xs text-gray-400/80 hover:text-gray-400">{{ $user->email }}</div>
                </div>
            </div>

            <!-- Mini Cards -->
            <div class="mt-2 flex flex-row items-center space-x-5">
                <!-- Comments -->
                <a href="#" class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                    <div class="flex flex-row items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 stroke-gray-500/95">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"/>
                            <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"/>
                        </svg>

                        <span class="font-bold text-gray-600"> {{ $user->comments->count() }} </span>
                    </div>

                    <div class="mt-2 text-sm text-gray-400">Comments</div>
                </a>

                <!-- Posts -->
                <a href="#" class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                    <div class="flex flex-row items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-3 stroke-gray-500/95">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M15 3v4a1 1 0 0 0 1 1h4"/>
                            <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"/>
                            <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"/>
                        </svg>

                        <span class="font-bold text-gray-600"> {{ $user->posts->count() }} </span>
                    </div>

                    <div class="mt-2 text-sm text-gray-400">Posts</div>
                </a>

                <!-- Follows -->
                <a href="#"
                   class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                    <div class="flex flex-row items-center justify-center">
                        <svg class="mr-3 fill-gray-500/95" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5.68,19.74C7.16,20.95 9,21.75 11,21.95V19.93C9.54,19.75 8.21,19.17 7.1,18.31M13,19.93V21.95C15,21.75 16.84,20.95 18.32,19.74L16.89,18.31C15.79,19.17 14.46,19.75 13,19.93M18.31,16.9L19.74,18.33C20.95,16.85 21.75,15 21.95,13H19.93C19.75,14.46 19.17,15.79 18.31,16.9M15,12A3,3 0 0,0 12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12M4.07,13H2.05C2.25,15 3.05,16.84 4.26,18.32L5.69,16.89C4.83,15.79 4.25,14.46 4.07,13M5.69,7.1L4.26,5.68C3.05,7.16 2.25,9 2.05,11H4.07C4.25,9.54 4.83,8.21 5.69,7.1M19.93,11H21.95C21.75,9 20.95,7.16 19.74,5.68L18.31,7.1C19.17,8.21 19.75,9.54 19.93,11M18.32,4.26C16.84,3.05 15,2.25 13,2.05V4.07C14.46,4.25 15.79,4.83 16.9,5.69M11,4.07V2.05C9,2.25 7.16,3.05 5.68,4.26L7.1,5.69C8.21,4.83 9.54,4.25 11,4.07Z"/>
                        </svg>

                        <span class="font-bold text-gray-600"> {{ $user->followings->count() }} </span>
                    </div>

                    <div class="mt-2 text-sm text-gray-400">Follows</div>
                </a>

                <!-- Followers -->
                <a href="#"
                   class="flex h-20 w-40 flex-col items-center justify-center rounded-md border border-dashed border-gray-200 transition-colors duration-100 ease-in-out hover:border-gray-400/80">
                    <div class="flex flex-row items-center justify-center">
                        <svg class="mr-3 fill-gray-500/95" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M5.68,19.74C7.16,20.95 9,21.75 11,21.95V19.93C9.54,19.75 8.21,19.17 7.1,18.31M13,19.93V21.95C15,21.75 16.84,20.95 18.32,19.74L16.89,18.31C15.79,19.17 14.46,19.75 13,19.93M18.31,16.9L19.74,18.33C20.95,16.85 21.75,15 21.95,13H19.93C19.75,14.46 19.17,15.79 18.31,16.9M15,12A3,3 0 0,0 12,9A3,3 0 0,0 9,12A3,3 0 0,0 12,15A3,3 0 0,0 15,12M4.07,13H2.05C2.25,15 3.05,16.84 4.26,18.32L5.69,16.89C4.83,15.79 4.25,14.46 4.07,13M5.69,7.1L4.26,5.68C3.05,7.16 2.25,9 2.05,11H4.07C4.25,9.54 4.83,8.21 5.69,7.1M19.93,11H21.95C21.75,9 20.95,7.16 19.74,5.68L18.31,7.1C19.17,8.21 19.75,9.54 19.93,11M18.32,4.26C16.84,3.05 15,2.25 13,2.05V4.07C14.46,4.25 15.79,4.83 16.9,5.69M11,4.07V2.05C9,2.25 7.16,3.05 5.68,4.26L7.1,5.69C8.21,4.83 9.54,4.25 11,4.07Z"/>
                        </svg>

                        <span class="font-bold text-gray-600"> {{ $user->followers->count() }} </span>
                    </div>

                    <div class="mt-2 text-sm text-gray-400">Followers</div>
                </a>
            </div>
        </div>

        <!-- Right Actions Container -->
        <div class="w-100 flex flex-grow flex-col items-end justify-start">
            <div class="flex flex-row space-x-3">
                <!-- Follow Button -->
                @auth
                    @if(auth()->user()->id !== $user->id)
                        @if(!auth()->user()->isFollowing($user))
                            <form method="POST" action="{{ route('profile.follow', ['user' => $user]) }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 w-full flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 stroke-current">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                        <path d="M16 19h6"/>
                                        <path d="M19 16v6"/>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"/>
                                    </svg>
                                    Follow
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('profile.unfollow', ['user' => $user]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 w-full flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 stroke-current">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4c.348 0 .686 .045 1.009 .128"/>
                                        <path d="M16 19h6"/>
                                    </svg>
                                    Unfollow
                                </button>
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 grid-flow-row-dense mx-auto text-center sm:gap-x-5 sm:grid-cols-2 lg:grid-cols-4 sm:text-left items-start">
        @include('profile.modules.sh-user-posts')
        <div class="col-span-2">
            @include('profile.modules.sh-user-wall')
        </div>
        @include('profile.modules.sh-user-followers')
    </div>
@endsection
