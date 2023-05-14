<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory(30)->create();

        foreach ($courses as $course) {
            Goal::factory(5)->create([
                'goalable_id' => $course->id,
                'goalable_type' => Course::class,
            ]);

            Image::factory(1)->create([
                'imageable_id' => $course->id,
                'imageable_type' => Course::class,
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
