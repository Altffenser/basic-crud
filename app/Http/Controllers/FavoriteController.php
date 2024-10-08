<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store(Request $request, Post $post)
    {

        $user = User::find(Auth::id());


        // Check if the post is already favorited by the user
        if ($post->isFavorite($user)) {
            return redirect()->back()->with('error', 'Post already in your favorites!');
        }

        // Add the post to the user's favorites
        $post->favorite($user, $post);

        return redirect()->back()->with('success', 'Post added to your favorites!');
    }

    public function destroy(Post $post)
    {
        $user = User::find(Auth::id());

        $post->unfavorite($user);

        return redirect()->back()->with('success', 'Post removed from your favorites!');
    }
}
