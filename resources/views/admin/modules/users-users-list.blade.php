<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
        <th scope="col" class="px-6 py-3">
            Display name
        </th>
        <th scope="col" class="px-6 py-3">
            Email
        </th>
        <th scope="col" class="px-6 py-3">
            Username
        </th>
        <th scope="col" class="px-6 py-3">
            Registered at
        </th>
        <th scope="col" class="px-6 py-3">
            Range
        </th>
        <th scope="col" class="px-6 py-3">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr class="bg-white border-b last:border-0 dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                {{--                            Route to profile--}}
                <a href="{{ route('profile.show', ['user' => $user]) }}" class="text-blue-600 dark:text-blue-500 hover:underline">
                    {{ $user->name }}
                </a>
            </th>
            <td class="px-6 py-4">
                {{--                            Clic to copy email with Alpine.js--}}
                <button x-data="{ open: false }" @click="open = true; navigator.clipboard.writeText('{{ $user->email }}').then(r => setTimeout(function() {open = false}, 2000))" @click.away="open = false" class="text-blue-600 dark:text-blue-500 hover:underline">
                    <span x-show="!open">{{ $user->email }}</span>
                    <span x-show="open" x-cloak>
                                    <span class="font-italic" x-text="`Email copied`"></span>
                                </span>
                </button>
            </td>
            <td class="px-6 py-4">
                {{ $user->profile->username }}
            </td>
            <td class="px-6 py-4">
                {{ $user->created_at->format('d/M/Y') }}
            </td>
            <td class="px-6 py-4">
                {{ $user->roles->first()->display_name ?? "Ninguno" }}
            </td>
            <td class="px-6 py-4 flex space-x-2.5" x-data="{user: null}">
                <x-button @click="$dispatch('open-modal', 'adminCreateUserModal', {user: {{ $user->toJson() }}})" color="blue">
                    Edit
                </x-button>
                <x-button href="{{ route('admin.user.destroy', ['user' => $user]) }}" color="red">
                    Delete
                </x-button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
