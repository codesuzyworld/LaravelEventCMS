<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Event;
use App\Models\Type;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return view('events.list', [
            'events' => Event::all()
        ]);
    }

    public function addForm()
    {
        return view('events.add', [
            'types' => Type::all(),
        ]);
    }

    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:events|regex:/^[A-z\-]+$/',
            'url' => 'nullable|url',
            'content' => 'required',
            'dateStart' => 'required',
            'dateEnd' => 'required', 
            'timeStart' => 'required',
            'timeEnd' => 'required',
            'eventLink' => 'nullable|url',
            'dateAdded' => 'required',
            'location_id' => 'required',
            'type_id' => 'required',
        ]);

        $event = new Event();
        $event->title = $attributes['title'];
        $event->slug = $attributes['slug'];
        $event->url = $attributes['url'];
        $event->content = $attributes['content'];
        $event->dateStart = $attributes['dateStart'];
        $event->dateEnd = $attributes['dateEnd'];
        $event->timeStart = $attributes['timeStart'];
        $event->timeEnd = $attributes['timeEnd'];
        $event->eventLink = $attributes['eventLink'];
        $event->dateAdded = $attributes['dateAdded'];
        $event->location_id = $attributes['location_id'];
        $event->type_id = $attributes['type_id'];
        $event->user_id = Auth::user()->id;
        $event->save();

        return redirect('/console/events/list')
            ->with('message', 'Event has been added!');
    }

    public function editForm(Event $event)
    {
        return view('events.edit', [
            'event' => $event,
            'types' => Type::all(),
        ]);
    }

    public function edit(Project $project)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'slug' => [
                'required',
                Rule::unique('projects')->ignore($project->id),
                'regex:/^[A-z\-]+$/',
            ],
            'url' => 'nullable|url',
            'content' => 'required',
            'dateStart' => 'required',
            'dateEnd' => 'required', 
            'timeStart' => 'required',
            'timeEnd' => 'required',
            'eventLink' => 'nullable|url',
            'dateAdded' => 'required',
            'location_id' => 'required',
            'type_id' => 'required',
        ]);

        $project->title = $attributes['title'];
        $event->slug = $attributes['slug'];
        $event->url = $attributes['url'];
        $event->content = $attributes['content'];
        $event->dateStart = $attributes['dateStart'];
        $event->dateEnd = $attributes['dateEnd'];
        $event->timeStart = $attributes['timeStart'];
        $event->timeEnd = $attributes['timeEnd'];
        $event->eventLink = $attributes['eventLink'];
        $event->dateAdded = $attributes['dateAdded'];
        $event->location_id = $attributes['location_id'];
        $event->type_id = $attributes['type_id'];
        $event->save();

        return redirect('/console/events/list')
            ->with('message', 'Event has been edited!');
    }

    public function delete(Event $event)
    {

        if($event->image)
        {
            Storage::delete($event->image);
        }
        
        $event->delete();
        
        return redirect('/console/events/list')
            ->with('message', 'Event has been deleted!');        
    }

    public function imageForm(Event $event)
    {
        return view('events.image', [
            'event' => $event,
        ]);
    }

    public function image(Event $event)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($event->image)
        {
            Storage::delete($event->image);
        }
        
        $path = request()->file('image')->store('events');

        $event->image = $path;
        $event->save();
        
        return redirect('/console/events/list')
            ->with('message', 'Event image has been edited!');
    }

}
