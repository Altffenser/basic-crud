<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\PostCategoryEnum;
use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Schema::disableForeignKeyConstraints();

        // Category::query()->truncate();
        // Post::query()->truncate();

        // Schema::enableForeignKeyConstraints();

        if (Category::query()->count() > 0) {
            return;
        }

        // Creates roles and permissions
        $this->call([
            RolesPermissionSeeder::class,
        ]);

        foreach (PostCategoryEnum::cases() as $category) {
            Category::factory()->create([
                'title' => $category->getLabel(),
                'icon' => $category->getIcon(),
                'color' => $category->getColor(),
            ]);
        }

        // Creates 5 users, each with a profile and 5 posts
        User::factory(5)->create()->each(function ($user) {
            $profile = Profile::factory()->make();
            $user->profile()->associate($profile);

            $user->assignRole('newe');

            $posts = Post::factory()->count(5)->create();

            $user->posts()->saveMany($posts);
        });

        User::find(1)->syncRoles('admin');

    }
}
