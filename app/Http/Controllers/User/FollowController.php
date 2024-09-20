<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(Request $request)
    {

        // Check that user not following themselves
        if ($request->user === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot follow yourself');
        }

        // Follow logic
        auth()->user()->follow(User::find($request->user));

        return redirect()->back()->with('success', 'User followed successfully');
    }

    public function unfollow(Request $request)
    {
        auth()->user()->unfollow(User::find($request->user));

        return redirect()->back()->with('success', 'User unfollowed successfully');

        // unfollow logic
    }
}
