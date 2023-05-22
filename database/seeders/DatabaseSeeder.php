<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses');
        Storage::deleteDirectory('sliders');
        Storage::makeDirectory('sliders');
        Storage::deleteDirectory('workshops');
        Storage::makeDirectory('workshops');

        User::create([
            'username'=> 'pablo7',
            'email'=> 'pablo@udh.edu.pe',
            'password'=> bcrypt('password'),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PostulantSeeder::class,
            ScheduleSeeder::class,
            ModalitySeeder::class,
            CourseSeeder::class,
            SliderSeeder::class,
        ]);
    }
}
