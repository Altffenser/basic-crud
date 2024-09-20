<?php

declare(strict_types=1);

namespace App\Traits;

trait HasDiceBearAvatar
{
    public function getAvatarUrl(string $format, string $eyesType, string $mouthType, int $size): string
    {
        return 'https://api.dicebear.com/9.x/bottts-neutral/'.$format.'?backgroundType=gradientLinear&eyes='.$eyesType.'&mouth='.$mouthType.'&size='.$size;
    }

    public function getAvatarTypeMouth(): array
    {
        return [
            'bite',
            'diagram',
            'grill01',
            'grill02',
            'grill03',
            'smile01',
            'smile02',
            'square01',
            'square02',
        ];
    }

    public function getAvatarTypeEyes(): array
    {
        return [
            'bulging',
            'dizzy',
            'eva',
            'frame1',
            'frame2',
            'glow',
            'happy',
            'hearts',
            'robocop',
            'round',
            'roundFrame01',
            'roundFrame02',
            'sensor',
            'shade01',
        ];
    }
}
