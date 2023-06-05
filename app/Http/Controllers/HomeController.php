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
        $countCourse = $this->countCourse();
        $countTrainings = $this->myTrainings();
        $countWorkshops = $this->myWorkshops();
        $listEvents = $this->listEvents();
        return view('dashboard', compact('sliders', 'events', 'countCourse', 'countTrainings', 'countWorkshops', 'listEvents'));
    }

    public function sliders()
    {
        return Slider::where('route', request()->path())->get();
    }

    public function events()
    {
        $allEvents = Event::where('start_date', '>=', date('Y-m-d'))->get();
        if (count($allEvents) == 0) return [];
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

    public function countCourse()
    {
        return auth()->user()->courses_enrolled->count();
    }

    public function myTrainings()
    {
        return auth()->user()->trainings_enrolled->count();
    }

    public function myWorkshops()
    {
        return auth()->user()->workshops_enrolled->count();
    }

    public function listEvents()
    {
        return Event::where('start_date', '>=', date('Y-m-d'))->get();
    }
}
