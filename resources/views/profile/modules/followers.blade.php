<div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-6 mb-5">
    <div class="flex space-x-2.5 items-center mb-5 text-black dark:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-current">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
        </svg>
        <h3 class="text-2xl font-bold leading-tight">Followers</h3>
    </div>
    {{--        Enlist posts from user--}}
    <div class="flex -space-x-4 rtl:space-x-reverse">
        @forelse($user->followers()->get() as $follower)
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="{{ $follower->profile->photo }}" alt="{{ $follower->name }}" title="{{ $follower->name }}">
        @empty
            <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    This user hasn't followers yet.
                </div>
            </div>
        @endforelse
    </div>
</div>
