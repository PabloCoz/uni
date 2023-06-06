<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Event;
use App\Models\Postulant;
use App\Models\Slider;
use App\Models\Training;
use App\Models\Workshop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = $this->courses();
        $trainings = $this->trainings();
        $workshops = $this->workshops();
        $postulants = $this->postulants();
        $sliders = $this->sliders();
        $postulants = $this->postulantsList();
        $events = $this->events();
        $coutEvents = count($events);
        return view('admin.home', compact('courses', 'trainings', 'workshops', 'postulants', 'sliders', 'postulants', 'events', 'coutEvents'));
    }

    public function courses()
    {
        return Course::where('status', Course::PUBLICADO)->count();
    }

    public function trainings()
    {
        return Training::where('status', Training::PUBLICADO)->count();
    }

    public function workshops()
    {
        return Workshop::where('status', Workshop::PUBLICADO)->count();
    }

    public function postulants()
    {
        return Postulant::where('validated', false)->count();
    }

    public function sliders()
    {
        return Slider::all();
    }

    public function postulantsList()
    {
        return Postulant::where('validated', false)->take(5)->latest()->get();
    }

    public function events()
    {
        $allEvents = Event::where('start_date', '>=', date('Y-m-d'))->get();
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
