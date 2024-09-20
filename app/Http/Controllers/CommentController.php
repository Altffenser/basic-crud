<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected string $model;

    protected array $allowedModels = [
        'App\Models\Post',
        'App\Models\Publication',
    ];

    public function __construct()
    {
        $this->model = Model::getActualClassNameForMorph(request()->route()->parameter('model'));
    }

    public function store(Request $request)
    {
        $model = $this->model::find($request->id);
        $user = Auth::user();

        // Check if the model is allowed
        if (!in_array($model->getMorphClass(), $this->allowedModels, true)) {
            return redirect()->back()->with('error', 'This model is not allowed to be commented!');
        }

        $model->comment($request->get('content'), user: $user);

        return redirect()->back();
    }

    /**
     * Delete comment by author
     */
    public function destroy(Request $request)
    {
        Post::find($request->post)->comment($request->get('content'), user: User::find($request->user));

        return redirect()->back();
    }
}
