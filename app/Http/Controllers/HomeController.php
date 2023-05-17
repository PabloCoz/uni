<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $sliders = $this->sliders();
        return view('dashboard', compact('sliders'));
    }

    public function sliders()
    {
        return Slider::all();
    }
}
