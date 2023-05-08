<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(10)->create();

        foreach ($courses as $course) {
            $images = Goal::factory(5)->create([
                'goalable_id' => $course->id,
                'goalable_type' => Course::class,
            ]);

            $modules = Module::factory(5)->create([
                'course_id' => $course->id,
            ]);

            foreach ($modules as $module) {
                Lesson::factory(5)->create([
                    'module_id' => $module->id,
                ]);
            }
        }
    }
}
