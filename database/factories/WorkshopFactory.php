<?php

namespace Database\Factories;

use App\Models\Modality;
use App\Models\Workshop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workshop>
 */
class WorkshopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'hours' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([Workshop::ELABORACION, Workshop::PUBLICADO]),
            'modality_id' => Modality::all()->random()->id,
        ];
    }
}
