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

        //        Category::factory(5)->sequence(
        //            ['title' => 'Laravel'],
        //            ['title' => 'PHP'],
        //            ['title' => 'JavaScript'],
        //            ['title' => 'Vue.js'],
        //            ['title' => 'React.js'],
        //            ['title' => 'Angular.js'],
        //            ['title' => 'Java'],
        //            ['title' => 'C#'],
        //            ['title' => 'C++'],
        //            ['title' => 'Python'],
        //        )->has(Post::factory()->count(1)->has(User::factory(1)->has(Profile::factory(1))))->create();

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

            $posts = Post::factory()->count(5)->create();

            $user->posts()->saveMany($posts);
        });
    }
}
