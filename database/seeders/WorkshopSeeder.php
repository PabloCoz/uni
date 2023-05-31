<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Session;
use App\Models\Workshop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workshops = Workshop::factory(10)->create();

        foreach ($workshops as $workshop) {
            Goal::factory(5)->create([
                'goalable_id' => $workshop->id,
                'goalable_type' => Workshop::class,
            ]);

            Image::factory(1)->create([
                'imageable_id' => $workshop->id,
                'imageable_type' => Workshop::class,
            ]);

            $sessions = Session::factory(5)->create([
                'workshop_id' => $workshop->id,
            ]);

            foreach ($sessions as $session) {
                Activity::factory(5)->create([
                    'session_id' => $session->id,
                ]);
            }
        }
    }
}
