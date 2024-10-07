@php
    $roles =  Spatie\Permission\Models\Role::all();
@endphp
@extends('admin.layout')
@section('admin-content')
    <x-box-content title="Users" icon="users" iconColor="pink" class="col-span-4">
        <div class="relative overflow-x-auto">
            <div class="flex p-4 justify-between items-center">
                <article id="user" x-init="$ajax('http://127.0.0.1:8000/api/posts/qui-officiis-quos-commodi-beatae-qui-consequatur', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    data: {
                        'id': 1
                    },
                    success: function(response) {
                        console.log(response)
                    },
                    error: function(error) {
                        console.log(error)
                    }
                })">
                    <svg class="loader text-red-600" aria-label="Loading content">Loading...</svg>
                </article>
                {{--                Button for add new user--}}
                <div x-data="{adminUserCreateModal}">
                    <x-button color="blue" @click="$dispatch('open-modal', 'adminUserCreateModal')">
                        @icon('user-plus text-xl') &nbsp;
                        New user
                    </x-button>
                    {{--                New user modal form--}}
                    <x-dialog-modal name="adminUserCreateModal" id="bcrypt(time())">
                        <x-slot name="title">
                            New user
                        </x-slot>
                        <x-slot:content>
                            ds
                        </x-slot:content>
                        <x-slot name="footer">
                            <x-button @click="$dispatch('close-modal', 'adminUserCreateModal')" color="red">
                                Cancel
                            </x-button>
                            <x-button @click="$dispatch('close-modal', 'adminUserCreateModal')" color="blue">
                                Save
                            </x-button>
                        </x-slot>
                    </x-dialog-modal>
                </div>
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            @icon('user')
                        </div>
                        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required/>
                    </div>
                    <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>


            </div>
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
                        <td class="px-6 py-4 flex space-x-2.5">
                            <x-button href="{{ route('admin.user.edit', ['user' => $user]) }}" class="bg-blue-500 hover:bg-blue-600">
                                Edit
                            </x-button>
                            <x-button href="{{ route('admin.user.destroy', ['user' => $user]) }}" class="bg-red-500 hover:bg-red-600">
                                Delete
                            </x-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </x-box-content>

    <div class="mt-5">
        {{ $users->links() }}
    </div>
@endsection
