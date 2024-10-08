<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{
    use HasFactory;

    /**
     * @property int $id
     * @property string $bio
     * @property string $website
     * @property string $github
     * @property string $x
     * @property string $facebook
     * @property string $photo
     *
     * @mixin Model
     */
    public $timestamps = false;

    protected $fillable = [
        'username',
        'bio',
        'website',
        'github',
        'x',
        'facebook',
        'photo',
    ];

    /**
     * @return Attribute<string|null, string|null>
     */
    protected function photo(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value): ?string {
                if (is_string($value)) {
                    if (filter_var($value, FILTER_VALIDATE_URL)) {
                        return $value;
                    }

                    return Storage::disk('public')->url($value);
                }

                return null;
            },
            set: function (string|UploadedFile|null $value): ?string {
                if ($value instanceof UploadedFile) {
                    return $value->store('profiles', 'public') ?: null;
                }

                return $value;
            }
        );
    }
}

/**
 * User => [Profile => [Avatar, Achievements], [Categories => Posts], Comments]
 */
