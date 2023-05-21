<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Slider;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = $this->sliders();
        return view('courses.index', compact('sliders'));
    }

    public function show(Course $course)
    {
        $this->authorize('published', $course);
        return view('courses.show', compact('course'));
    }

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }
}
