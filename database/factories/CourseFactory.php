<?php

namespace Database\Factories;

use App\Models\Modality;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'description' => $this->faker->paragraph(),
            'hours' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->randomElement([1, 2]),
            'slug' => Str::slug($title),
            'modality_id' => Modality::all()->random()->id,
            'user_id' => 1,
        ];
    }
}
