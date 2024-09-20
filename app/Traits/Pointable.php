<?php

declare(strict_types=1);

namespace App\Traits;



use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Model
 */
trait Pointable
{

    public function givePoints(int $points): void
    {
        $this->increment('points', $points);
    }

    public function getPoints(): int
    {
        return $this->points;
    }

}
