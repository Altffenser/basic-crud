<?php

declare(strict_types=1);

namespace App\Builders;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use RyanChandler\Comments\Models\Comment;

/**
 * @template TModelClass of \App\Models\Post
 *
 * @extends Builder<Post>
 */
class PostBuilder extends Builder
{
    public function search(string $search): static
    {
        $this->where('title', 'like', '%' . $search . '%');

        return $this;
    }

    public function sortBy(string $column, string $direction = 'asc'): static
    {
        $this->orderBy($column, $direction);

        return $this;
    }

    public function published(): static
    {
        $this->where('published_at', '<=', now());

        return $this;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
