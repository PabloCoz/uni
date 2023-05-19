<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $sliders = $this->sliders();
        return view('welcome', compact('sliders'));
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }
}
