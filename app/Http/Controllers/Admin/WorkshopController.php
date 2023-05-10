<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modality;
use App\Models\Schedule;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        return view('admin.workshops.index');
    }

    public function create()
    {
        $modalities = Modality::pluck('name', 'id');
        $schedules = Schedule::pluck('start', 'end', 'id');
        return view('admin.workshops.create', compact('modalities', 'schedules'));
    }

    public function store(Request $request)
    {

    }

    public function show(Workshop $workshop)
    {

    }

    public function edit(Workshop $workshop, Request $request)
    {

    }

    public function destroy(Workshop $workshop)
    {

    }
}
