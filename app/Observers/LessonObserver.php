<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;

class LessonObserver
{
    public function deleting(Lesson $lesson)
    {
        if ($lesson->resources) {
            foreach ($lesson->resources as $resource) {
                Storage::delete($resource->url);
                $resource->delete();
            }
        }
    }
}
