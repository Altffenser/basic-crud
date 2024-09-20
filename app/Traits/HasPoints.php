<?php

declare(strict_types=1);

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @mixin Model
 */
trait HasPoints
{
    public function availablePoints(): int
    {
        return $this->available_points;
    }

    // Get earned points from each post
    public function points()
    {
        return $this->hasMany('App\Models\Post')->sum('points');
    }

    // Give points to post
    public function givePoints($points)
    {
        $this->increment('points', $points);
        $this->user()->update([
            'available_points' => $this->user()->available_points - $points,
        ]);
    }

    /**
     * Increment the user's available points after 24 hours (UTC-6)
     * TODO: Implement enums for roles and ranges to match the user's role and points amount.
     */
    public function restorePoints(): void
    {
        // Calculate 24 hours starting at 12:00 noon and ending at 12:00 noon the next day
        // First, we must calculate the hours spent so far as of 12:00 p.m. of the previous day
        $previousDay = Carbon::now()->diffInHours(Carbon::now()->startOfDay()->addHours(12)->subDay());

        // Compare the hours spent so far with 24 hours
        if (($previousDay * (-1)) >= 24) {
            // Restore points
            $this->update([
                'available_points' => 10,
            ]);
        }
    }

    /**
     * Check if the Post is already pointed by the user.
     * @param Model $user
     * @return bool
     */
    public function alreadyPointed(Model $user): bool
    {
        return DB::table('pointed')
            ->where('pointed_id', $this->id)
            ->where('pointed_type', $this->getMorphClass())
            ->where('user_id', $user->id)
            ->exists();
    }
}
