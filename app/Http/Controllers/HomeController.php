<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $events = $this->events();
        $sliders = $this->sliders();
        return view('dashboard', compact('sliders', 'events'));
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }

    public function events()
    {
        $allEvents = Event::all();
        if(count($allEvents) == 0) return [];
        foreach ($allEvents as $event) {
            $events[] = [
                'title' => $event->title,
                'start' => $event->start_date,
                'end' => date("Y-m-d", strtotime($event->end_date . " +1 day")),
                'allDay' => true,
            ];
        }
        return $events;
    }
}
