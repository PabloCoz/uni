<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Modality;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __contruct()
    {
        $this->middleware('can:Leer Contenido')->only('index');
        $this->middleware('can:Crear Contenido')->only('create', 'store');
        $this->middleware('can:Actualizar Contenido')->only('edit', 'update', 'show');
        $this->middleware('can:Eliminar Contenido')->only('destroy');
        $this->middleware('can:Publicar Contenido')->only('approvedCourse');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $modalities = Modality::pluck('name', 'id');
        return  view('admin.courses.create', compact('modalities'));
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
            'modality_id' => 'required',
            'user_id' => 'required',
            'hours' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file' => 'image',
        ]);
        $course = Course::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));
            $course->image()->create([
                'url' => $url
            ]);
        }

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
        return view('admin.courses.edit', compact('course', 'modalities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:courses,slug,$course->id",
            'hours' => 'required',
            'description' => 'required',
            'modality_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file' => 'image',
        ]);
        $course->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('courses', $request->file('file'));
            if ($course->image) {
                Storage::delete($course->image->url);
                $course->image->update([
                    'url' => $url
                ]);
            } else {
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.courses.index', $course)->with('info', 'El curso se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('info', 'El curso se eliminó con éxito');
    }

    public function approvedCourse(Course $course)
    {
        $course->status = 2;
        $course->save();
        return redirect()->route('admin.courses.index')->with('info', 'Publicado correctamente');
    }
}
