<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Middleware\CheckPointed;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JetBrains\PhpStorm\NoReturn;

class PointsController extends Controller
{

    /**
     * @param Request $request <Post,  User>
     * @return RedirectResponse
     */
    #[NoReturn]
    public function store(Request $request)
    {
        $post = Post::find($request->post);
        $user = Auth::user();

        // Check that the author not give points to his post
        if ($post->user_id === $user->id) {
            return redirect()->back()->with('error', 'You cannot give points to your own post!');
        }

        // Check if user has enough points
        if ($user->available_points < (int)$request->points) {
            return redirect()->back()->with('error', 'You do not have enough points!');
        }

        // Add points to post
        $post->givePoints((int)$request->points);

        // Decrease points from user
        DB::table('users')->where('id', $user->id)->update([
            'available_points' => $user->available_points - (int)$request->points,
        ]);


        return redirect()->back()->with('success', 'Points added successfully!');
    }
}
