<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.events.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|unique:events',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'file' => 'image',
        ]);

        $event = Event::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('events', $request->file('file'));

            $event->image()->create([
                'url' => $url,
            ]);
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => "required|unique:events,slug,$event->id",
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'file' => 'nullable|image',
        ]);

        $event->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('events', $request->file('file'));

            if ($event->image) {
                Storage::delete($event->image->url);

                $event->image->update([
                    'url' => $url,
                ]);
            } else {
                $event->image()->create([
                    'url' => $url,
                ]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
    }
}
