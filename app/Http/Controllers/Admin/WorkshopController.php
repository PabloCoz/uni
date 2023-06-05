<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkshopController extends Controller
{
    public function __contruct()
    {
        $this->middleware('can:Leer Contenido')->only('index');
        $this->middleware('can:Crear Contenido')->only('create', 'store');
        $this->middleware('can:Actualizar Contenido')->only('edit', 'update', 'show');
        $this->middleware('can:Eliminar Contenido')->only('destroy');
        $this->middleware('can:Publicar Contenido')->only('approvedWorkshop');
    }

    public function index()
    {
        return view('admin.workshops.index');
    }

    public function create()
    {
        $modalities = Modality::pluck('name', 'id');
        return view('admin.workshops.create', compact('modalities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:workshops',
            'description' => 'required',
            'modality_id' => 'required',
            'user_id' => 'required',
            'hours' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file' => 'image',
        ]);
        $workshop = Workshop::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('workshops', $request->file('file'));
            $workshop->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('admin.workshops.index', $workshop)->with('info', 'El curso se creó con éxito');
    }

    public function show(Workshop $workshop)
    {
        return view('admin.workshops.show', compact('workshop'));
    }

    public function edit(Workshop $workshop, Request $request)
    {
        $modalities = Modality::pluck('name', 'id');
        return view('admin.workshops.edit', compact('workshop', 'modalities'));
    }

    public function update(Request $request, Workshop $workshop)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:workshops,slug,$workshop->id",
            'description' => 'required',
            'modality_id' => 'required',
            'hours' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'file' => 'image',
        ]);
        $workshop->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('workshops', $request->file('file'));
            if ($workshop->image) {
                Storage::delete($workshop->image->url);
                $workshop->image->update([
                    'url' => $url
                ]);
            } else {
                $workshop->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.workshops.edit', $workshop)->with('info', 'El curso se actualizó con éxito');
    }

    public function destroy(Workshop $workshop)
    {
        $workshop->delete();
        return redirect()->route('admin.workshops.index')->with('info', 'El curso se eliminó con éxito');
    }

    public function approvedWorkshop(Workshop $workshop)
    {
        $workshop->status = 2;
        $workshop->save();
        return redirect()->route('admin.workshops.index')->with('info', 'Publicado correctamente');
    }
}
