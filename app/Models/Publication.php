<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Overtrue\LaravelLike\Traits\Likeable;
use RyanChandler\Comments\Concerns\HasComments;

/**
 * @property int $id
 * @property string $content
 * @property User $user_id
 * @property User $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @mixin Model
 */
class Publication extends Model
{
    use HasComments;
    use Likeable;
    use HasComments;

    protected $fillable = [
        'content',
        'user_id',
        'published_at',
    ];

    /**
     * @return Attribute<User>
     */
    public function publishedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => User::find($value)
        );
    }

    /**
     * @return Attribute<User>
     */
    public function userId(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => User::find($value)
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publicationsByOthers(Model $user)
    {
        return $this->publications()->where('published_at', '==', $user->id);
    }
}
