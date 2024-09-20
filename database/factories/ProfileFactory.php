<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use LasseRafn\InitialAvatarGenerator\InitialAvatar;
use Override;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[Override]
    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName,
            'bio' => $this->faker->sentence,
            'website' => $this->faker->url,
            'github' => $this->faker->url,
            'x' => $this->faker->url,
            'facebook' => $this->faker->url,
            'photo' => function () {
                $name = Str::random(40).'.png';
                Storage::disk('public')->put($name, (new InitialAvatar)->name($name)->size(192)->rounded()->generate()->stream());

                return $name;
            },
            'birthday' => $this->faker->date(),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'phone' => $this->faker->phoneNumber,
            'occupation' => $this->faker->jobTitle,
            'hobbies' => $this->faker->words(3, true),
            'skills' => $this->faker->words(3, true),
        ];
    }
}
