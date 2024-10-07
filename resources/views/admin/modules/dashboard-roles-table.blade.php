<x-box-content title="Roles" icon="shield" iconColor="purple" class="col-span-4">
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Display name
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Icon
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($userRoles as $role)
                <tr class="bg-white border-b last:border-0 dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-{{ $role->color }}-500 whitespace-nowrap">
                        {{ $role->display_name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $role->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $role->description }}
                    </td>
                    <td class="px-6 py-4">
                        @icon($role->icon . ' text-2xl text-'. $role->color . '-500')
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</x-box-content>
