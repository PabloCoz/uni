<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $sliders = $this->sliders();
        return view('workshops.index', compact('sliders'));
    }

    public function show(Workshop $workshop)
    {
        return view('workshops.show', compact('workshop'));
    }

    public function enrolled(Workshop $workshop)
    {
        $workshop->students()->attach(auth()->user()->id);
        return redirect()->route('workshops.status', $workshop);
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }
}
