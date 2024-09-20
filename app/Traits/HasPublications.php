<?php

namespace App\Traits;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use function PHPUnit\Framework\callback;

/**
 * @mixin Model
 */
trait HasPublications
{

    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class, 'user_id');
    }

    // Author of the publication
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publicationsByOthers(User $user): HasMany
    {
        return $this->publications()->where('published_at', '==', $user->id);
    }

    public function allPublications(User $user)
    {
        return Publication::query()
            ->WhereAny([
                'user_id',
                'published_at',
            ], '=', $user->id)
            ->get();
    }
}
