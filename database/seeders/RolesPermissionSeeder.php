<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'admin' => [
                'display_name' => __('roles.display_name.admin'),
                'description' => __('roles.description.admin'),
                'permissions' => [
                    'all',
                ],
                'color' => 'red',
                'icon' => 'medal-2',
            ],
            'mode' => [
                'display_name' => __('roles.display_name.mode'),
                'description' => __('roles.description.mode'),
                'permissions' => [
                    'create-post',
                    'edit-post',
                    'hide-post',
                    'ban-users',
                    'suspend-user',
                    'comment-status',
                    'comment-post',
                    'create-status',
                    'hide-status',
                ],
                'color' => 'sky',
                'icon' => 'military-award',
            ],
            'newe' => [
                'display_name' => __('roles.display_name.newe'),
                'description' => __('roles.description.newe'),
                'permissions' => [
                    'create-post',
                    'comment-post',
                ],
                'color' => 'green',
                'icon' => 'arrow-badge-up',
            ],
            'nefu' => [
                'display_name' => __('roles.display_name.nefu'),
                'description' => __('roles.description.nefu'),
                'permissions' => [
                    'create-post',
                    'comment-post',
                    'comment-status',
                    'create-status',
                ],
                'color' => 'cyan',
                'icon' => 'badges',
            ],
            'fuus' => [
                'display_name' => __('roles.display_name.fuus'),
                'description' => __('roles.description.fuus'),
                'permissions' => [
                    'create-post',
                    'comment-post',
                    'comment-status',
                    'create-status',
                ],
                'color' => 'purple',
                'icon' => 'military-rank',
            ],
            'grus' => [
                'display_name' => __('roles.display_name.grus'),
                'description' => __('roles.description.grus'),
                'permissions' => [
                    'create-post',
                    'comment-post',
                    'comment-status',
                    'create-status',
                ],
                'color' => 'indigo',
                'icon' => 'mood-crazy-happy',
            ],
        ];

        $permissions = [
            'all' => [
                'display_name' => __('permissions.display_name.all'),
                'description' => 'Have all permissions.',
            ],
            'create-post' => [
                'display_name' => __('permissions.display_name.create-post'),
            ],
            'edit-post' => [
                'display_name' => __('permissions.display_name.edit-post'),
            ],
            'hide-post' => [
                'display_name' => __('permissions.display_name.hide-post'),
            ],
            'delete-post' => [
                'display_name' => __('permissions.display_name.delete-post'),
            ],
            'ban-users' => [
                'display_name' => __('permissions.display_name.ban-users'),
            ],
            'suspend-user' => [
                'display_name' => __('permissions.display_name.suspend-users'),
            ],
            'comment-status' => [
                'display_name' => __('permissions.display_name.comment-status'),
            ],
            'comment-post' => [
                'display_name' => __('permissions.display_name.comment-post'),
            ],
            'create-status' => [
                'display_name' => __('permissions.display_name.create-status'),
            ],
            'hide-status' => [
                'display_name' => __('permissions.display_name.hide-status'),
            ],
        ];

        foreach ($permissions as $permission => $values) {
            Permission::create([
                'name' => $permission,
                'display_name' => $values['display_name'],
                'guard_name' => 'web',
            ]);
        }

        foreach ($roles as $name => $role) {
            // Create role
            Role::create([
                'name' => $name,
                'display_name' => $role['display_name'],
                'description' => $role['description'],
                'color' => $role['color'],
                'icon' => $role['icon'],
                'guard_name' => 'web',
            ])->givePermissionTo($role['permissions']);
        }

    }
}
