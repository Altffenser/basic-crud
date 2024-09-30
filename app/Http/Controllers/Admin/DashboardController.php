<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use RyanChandler\Comments\Models\Comment;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * Get users, posts, comments and categories count.
         */

        $usersCount = User::count();
        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $categoriesCount = Category::count();

        return view('admin.dashboard', [
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'commentsCount' => $commentsCount,
            'categoriesCount' => $categoriesCount,
        ]);
    }
}
