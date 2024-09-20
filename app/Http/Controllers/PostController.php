<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Builders\PostBuilder;
use App\Enums\PostSortColumnsEnum;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Support\QueryResolver;
use App\Support\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RyanChandler\Comments\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Last posts
        $posts = Post::query()
            ->select('id', 'title', 'image', 'tags', 'is_featured', 'points', 'category_id', 'user_id', 'created_at', 'updated_at')
            ->withAggregate('category', 'title')
            ->when($request->string('search')->toString(), function (PostBuilder $query, string $search): void {
                $query->search($search);
            })
            ->when($request->input('published'), fn(PostBuilder $query): PostBuilder => $query->published())
            ->when(
                in_array($request->input('sortBy'), PostSortColumnsEnum::columns(), true),
                function (PostBuilder $query) use ($request): void {
                    $query->sortBy($request->string('sortBy')->toString(), $request->string('direction')->toString());
                },
                fn(PostBuilder $query) => $query->latest(),
            )
            ->paginate(10)
            ->withQueryString();

        // Last users
        $users = User::orderBy('created_at', 'desc')->take(5)->get();

        // Last comments
        $comments = Comment::whereHasMorph('commentable', Post::class)->with(['user', 'commentable:id,title'])->get();

        // TOP Posts by points
        $topPosts = Post::query()
            ->select('id', 'title', 'points', 'category_id', 'user_id', 'created_at')
            ->where('points', '>', 0)
            ->orderBy('points', 'desc')
            ->with('user:id,name')
            ->take(5)
            ->get();

        return view('posts.index', [
            'posts' => $posts,
            'users' => $users,
            'comments' => $comments,
            'topPosts' => $topPosts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('posts.create', [
            'categories' => Category::query()->pluck('title', 'id'),
            'tags' => Settings::getTags(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        Post::query()->create($request->validated());

        return to_route('posts.index', QueryResolver::getPreviousQuery('posts.index'))
            ->with('success', __('posts.messages.Post created successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        // Add visit
        $post->visit();

        return view('posts.show', [
            'post' => Post::find($post->id)->loadAggregate('category', 'title'),
            'related' => Post::whereJsonContains('tags', $post->tags)->take(5)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::query()->pluck('title', 'id'),
            'tags' => Settings::getTags(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return to_route('posts.index', QueryResolver::getPreviousQuery('posts.index'))
            ->with('success', __('posts.messages.Post updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return to_route('posts.index', QueryResolver::getPreviousQuery('posts.index'))
            ->with('success', __('posts.messages.Post deleted successfully'));
    }
}
