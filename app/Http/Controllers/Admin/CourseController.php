<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Modality;
use App\Models\Schedule;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return  view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $modalities = Modality::pluck('name', 'id');
        $schedules = Schedule::pluck('start', 'end', 'id');
        return  view('admin.courses.create', compact('modalities', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'description' => 'required',
            'category_id' => 'required',
            'modality_id' => 'required',
            'schedule_id' => 'required',
            /* 'file' => 'image', */
        ]);
        $course = Course::create($request->all());

        return redirect()->route('admin.courses.index', $course)->with('info', 'El curso se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course): View
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course): View
    {
        $modalities = Modality::pluck('name', 'id');
        $schedules = Schedule::pluck('start', 'end', 'id');
        return view('admin.courses.edit', compact('course', 'modalities', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:courses,slug,$course->id",
            'description' => 'required',
            'category_id' => 'required',
            'modality_id' => 'required',
            'schedule_id' => 'required',
            /* 'file' => 'image', */
        ]);
        $course->update($request->all());

        return redirect()->route('admin.courses.index', $course)->with('info', 'El curso se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
