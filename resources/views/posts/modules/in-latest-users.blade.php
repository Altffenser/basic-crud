<x-box-content title="Últimos usuarios" icon="message text-green-500">
    @foreach($users as $user)
        <li class="flex space-x-1.5 items-center dark:odd:bg-gray-700 last:rounded-b p-2">
            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                <img src="{{ $user->profile->photo }}" alt="">
            </div>
            <div class="flex flex-col">
                <a href="{{ route('profile.show', ['user' => $user]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-sm">{{ $user->name }}</a>
                <span class="text-[8pt] text-gray-400">{{ $user->created_at->diffForHumans() }} &centerdot; {{ $user->profile->username }}</span>
            </div>
        </li>
    @endforeach
</x-box-content>
