<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $sliders = $this->sliders();
        return view('trainings.index', compact('sliders'));
    }

    public function show(Training $training)
    {
        return view('trainings.show', compact('training'));
    }

    public function enrolled(Training $training)
    {
        $training->users()->attach(auth()->user()->id);
        return redirect()->route('trainings.status', $training);
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }
}
