<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use RyanChandler\Comments\Models\Comment;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{

    public function index(): View
    {
        /**
         * Get users, posts, roles, comments and categories count.
         */

        $userRoles = Role::all();
        $usersCount = User::count();
        $postsCount = Post::count();
        $commentsCount = Comment::count();
        $categoriesCount = Category::count();

        return view('admin.pages.dashboard', [
            'userRoles' => $userRoles,
            'usersCount' => $usersCount,
            'postsCount' => $postsCount,
            'commentsCount' => $commentsCount,
            'categoriesCount' => $categoriesCount,
        ]);
    }
}
