<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use App\Models\Training;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    public function __contruct()
    {
        $this->middleware('can:Leer Contenido')->only('index');
        $this->middleware('can:Crear Contenido')->only('create', 'store');
        $this->middleware('can:Actualizar Contenido')->only('edit', 'update', 'show');
        $this->middleware('can:Eliminar Contenido')->only('destroy');
        $this->middleware('can:Publicar Contenido')->only('approvedTraining');
    }

    public function index(): View
    {
        return view('admin.trainings.index');
    }

    public function create(): View
    {
        $modalities = Modality::pluck('name', 'id');
        return view('admin.trainings.create', compact('modalities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'description' => 'required',
            'modality_id' => 'required',
            'user_id' => 'required',
            'file' => 'image',
        ]);
        $training = Training::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('trainings', $request->file('file'));
            $training->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.trainings.index', $training)->with('info', 'El curso se creó con éxito');
    }

    public function show(Training $training): View
    {
        return view('admin.trainings.show', compact('training'));
    }

    public function edit(Training $training): View
    {
        $modalities = Modality::pluck('name', 'id');
        return view('admin.trainings.edit', compact('training', 'modalities'));
    }

    public function update(Request $request, Training $training)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:trainings,slug,$training->id",
            'description' => 'required',
            'modality_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file' => 'image',
        ]);
        $training->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('trainings', $request->file('file'));
            if ($training->image) {
                Storage::delete($training->image->url);
                $training->image->update([
                    'url' => $url
                ]);
            } else {
                $training->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.trainings.edit', $training)->with('info', 'El curso se actualizó con éxito');
    }

    public function destroy(Training $training)
    {
        $training->delete();
        return redirect()->route('admin.trainings.index')->with('info', 'El curso se eliminó con éxito');
    }

    public function approvedTraining(Training $training)
    {
        $training->status = 2;
        $training->save();
        return redirect()->route('admin.trainings.index')->with('info', 'El curso se aprobó con éxito');
    }
}
