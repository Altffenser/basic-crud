<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckPointed
{
    public function handle(Request $request, Closure $next)
    {
        $post = Post::find($request->post);
        $user = Auth::user();

        $alreadyPointed = DB::table('pointed')
            ->where('pointed_id', $post->id)
            ->where('pointed_type', $post->getMorphClass())
            ->where('user_id', $user->id)
            ->exists();

        if (! $alreadyPointed) {
            DB::table('pointed')->insert([
                'pointed_id' => $post->id,
                'pointed_type' => $post->getMorphClass(),
                'user_id' => $user->id,
            ]);
        }

        return $next($request);
    }
}
