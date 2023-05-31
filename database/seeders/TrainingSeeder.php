<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\Image;
use App\Models\Theme;
use App\Models\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = Training::factory(10)->create();

        foreach ($trainings as $training) {
            Goal::factory(5)->create([
                'goalable_id' => $training->id,
                'goalable_type' => Training::class,
            ]);

            Image::factory(1)->create([
                'imageable_id' => $training->id,
                'imageable_type' => Training::class,
            ]);

            Theme::factory(5)->create([
                'training_id' => $training->id,
            ]);
        }
    }
}
