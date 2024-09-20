<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
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
        if (! in_array($model->getMorphClass(), $this->allowedModels, true)) {
            return redirect()->back()->with('error', 'This model is not allowed to be liked!');
        }

        // Like the resource
        $user->toggleLike($model);

        return redirect()->back()->with('success', 'Resource liked successfully!');
    }
}
