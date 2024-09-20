<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

/**
 * @mixin Model
 */
trait HasFavorites
{
    public function favorites(): MorphMany
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }

    public function favorite(?Model $user = null): void
    {
        $this->favorites()->create([
            'user_id' => $user ? $user->getKey() : Auth::id(),
            'favoritable_id' => $this->getKey(),
            'favoritable_type' => $this->getMorphClass(),
        ]);
    }

    public function unfavorite(?Model $user = null): void
    {
        $this->favorites()
            ->where('user_id', $user ? $user->getKey() : Auth::id())
            ->where('favoritable_id', '=', $this->id)->delete();
    }

    /**
     * Know if the post is already favorited by the user
     */
    public function isFavorite(?Model $user = null): bool
    {
        return $this->favorites()
            ->where('user_id', $user ? $user->getKey() : Auth::id())
            ->where('favoritable_id', '=', $this->id)->exists();
    }
}
