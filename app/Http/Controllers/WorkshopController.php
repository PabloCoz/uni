<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        return view('workshops.index');
    }

    public function show(Workshop $workshop)
    {
        return view('workshops.show', compact('workshop'));
    }
}
