<div class="flex flex-row bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
    <ul class="flex flex-col w-full">
        <div class="p-2 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
            <h4 class="text-xl font-bold dark:text-white">Últimos usuarios</h4>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
            </svg>
        </div>
        @forelse ($users as $user)
            <li class="flex space-x-1.5 items-center dark:odd:bg-gray-700 last:rounded-b p-2">
                <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                    <img src="{{ $user->profile->photo }}" alt="">
                </div>
                <div class="flex flex-col">
                    <a href="{{ route('profile.show', ['user' => $user]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ $user->name }}</a>
                    <span class="text-[8pt] text-gray-400">{{ $user->created_at->diffForHumans() }} &centerdot; {{ $user->profile->username }}</span>
                </div>
            </li>
        @empty
            <li>No users found.</li>
        @endforelse
    </ul>
</div>
