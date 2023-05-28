<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $sliders = $this->sliders();
        return view('training.index', compact('sliders'));
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }
}
