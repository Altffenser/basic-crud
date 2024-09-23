<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\PostCategoryEnum;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Override;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
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
            'title' => $this->faker->unique()->randomElement(PostCategoryEnum::cases())->getLabel(),
            'icon' => $this->faker->randomElement(PostCategoryEnum::cases())->getIcon(),
            'color' => $this->faker->randomElement(PostCategoryEnum::cases())->getColor(),
        ];
    }
}
