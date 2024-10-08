<div x-data>
    <x-button color="blue" @click="$dispatch('open-modal', 'adminCreateUserModal')">
        @icon('user-plus text-xl') &nbsp;
        New user
    </x-button>
    {{--                New user modal form--}}
    <x-dialog-modal name="adminCreateUserModal">
        <x-slot name="title">
            New user
        </x-slot>
        <x-slot:content>
            <form action="{{ route('admin.user.store') }}" method="POST" id="admin_user_store">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col">
                            <x-input-label for="name" value="Name"/>
                            <x-text-input id="name" name="name" required/>
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="username" value="Username"/>
                            <x-text-input id="username" name="username" required/>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <x-input-label for="email" value="Email"/>
                        <x-text-input id="email" name="email" type="email" required/>
                    </div>
                    <div class="flex flex-col relative" x-data="{show: false}">
                        <x-input-label for="password" value="Password"/>
                        <x-text-input id="password" name="password" type="password" required/>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col">
                            <x-input-label for="role" value="Role"/>
                            <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-50" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <x-input-label for="available_points" value="Available points"/>
                            <x-text-input id="available_points" name="available_points" type="number" value="10" required/>
                        </div>
                    </div>
                </div>
            </form>
        </x-slot:content>
        <x-slot name="footer">
            <x-button @click="$dispatch('close-modal', 'adminUserCreateModal')" color="red">
                Cancel
            </x-button>
            <x-button type="submit" color="blue" form="admin_user_store">
                Save
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
