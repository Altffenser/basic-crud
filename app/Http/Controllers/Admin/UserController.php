<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.pages.users', [
            'users' => User::query()->paginate(15),
        ]);
    }

    public function store(User $user, Request $request): RedirectResponse
    {
        $profile = Profile::create([
            'username' => $request->username,
        ]);

        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'available_points' => $request->available_points,
            'profile_id' => $profile->id,
        ])->assignRole($request->role);

        return redirect()->back()->with('success', 'User created successfully!');
    }
}
