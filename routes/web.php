<?php

declare(strict_types=1);

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FeaturedPostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\User\FollowController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// alternative to the above
// Route::view('/','welcome');

// set locale cookie
Route::get('/set-locale/{locale}', LocaleController::class)->name('set-locale');

// similar to: (but not best practice)
// Route::get('/set-locale/{locale}', fn ($locale) => back()->withCookie(cookie()->forever('locale', $locale)))->name('set-locale');

// redirect to posts
Route::redirect('/', '/posts');

// resource route for posts controller (all routes)
Route::resource('posts', PostController::class);

// feature post route (patch request) - only one route needed
Route::patch('/posts/{post}/feature', FeaturedPostController::class)->name('posts.featured');

// similar to:
// Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
// Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
// Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

/**
 * PROFILE ROUTES
 */
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->prefix('account')->group(function () {
    // Edit profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('account.profile.edit');
    // Update profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('account.profile.update');
    // Delete profile
    // TODO: Not allow to user to delete their account
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('account.profile.destroy');
});

Route::middleware('auth')->prefix('profile')->group(function () {
    // Follow user
    Route::post('/{user}/follow', [FollowController::class, 'follow'])->name('profile.follow');
    // Unfollow user
    Route::delete('/{user}/follow', [FollowController::class, 'unfollow'])->name('profile.unfollow');
});

/**
 * COMMENTS ROUTES
 */
Route::prefix('posts')->group(function () {
    // Route to store a comment
    Route::post('{post}/comments', [CommentController::class, 'store'])->name('post.comments.store')->middleware('auth');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('post.comments.destroy')->middleware('auth');

    // Route for store points
    Route::post('{post}/points', [PointsController::class, 'store'])->name('post.points.store')->middleware('auth', 'pointed');
});

/**
 * FAVORITES ROUTES
 */
Route::post('posts/{post}/favorite', [FavoriteController::class, 'store'])->name('post.favorite.store')->middleware('auth');
Route::delete('posts/{post}/favorite', [FavoriteController::class, 'destroy'])->name('post.favorite.destroy')->middleware('auth');

Route::prefix('resources')->middleware('auth')->group(function () {
    /**
     * COMMENTS ROUTES
     */
    Route::post('{model}/comment/{id}', [CommentController::class, 'store'])->name('resource.comments.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('resource.comments.destroy');
    /**
     * LIKE ROUTES
     */
    Route::post('{model}/like/{id}', [LikeController::class, 'store'])->name('resource.like.store');

});
/**
 * PUBLICATIONS ROUTES
 */
Route::post('publications/', [PublicationController::class, 'store'])->name('publications.store')->middleware('auth');

require __DIR__.'/auth.php';
