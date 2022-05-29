<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('event management')){
            return view('backend.pages.Events.index',[
                'events' => Events::latest()->paginate(10),
            ]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->can('event management')){
            return view('backend.pages.Events.create',[
                'projects' => Project::all(),
            ]);
        }else{
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        if(auth()->user()->can('event management')){
            $request->validate([
                'project_id' => 'required',
                'title' => 'required|string|max:100|min:2',
                'description' => 'required',
                'location' => 'required',
                'event_date' => 'required',
                'image' => 'required|mimes:png,jpg,webp,jpeg',
            ]);
            $event = new Events();
            $event->project_id = $request->project_id;
            $event->title = $request->title;
            $event->slug = Str::slug($request->title);
            $event->description = $request->description;
            $event->location = $request->location;
            $event->event_date = $request->event_date;
            $event->tags = $request->tags;
            $event->save();
            if($request->hasFile('image')){
                $image = $request->file('image');
                $newName = Str::slug($event->slug).Str::random(5).'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/projects/events/'.$newName);
                Image::make($image)->save($destination);
                $event->image = $newName;
                $event->save();
            }
            // $event->image = $request->
            return redirect()->route('events.index')->with('success','New events added!');
        }else{
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->can('event management')){
            return view('backend.pages.Events.show',[
                'event' => Events::find($id),
            ]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->can('event management')){
            return view('backend.pages.Events.edit',[
                'event' => Events::find($id),
                'projects' => Project::all(),
            ]);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->can('event management')){
            $event = Events::find($request->event_id);
            $request->validate([
                'project_id' => 'required',
                'title' => 'required|string|max:100|min:2',
                'description' => 'required',
                'event_date' => 'required',
                'location' => 'required',
            ]);
            $event->project_id = $request->project_id;
            $event->title = $request->title;
            $event->slug = Str::slug($request->title);
            $event->event_date = $request->event_date;
            $event->description = $request->description;
            $event->location = $request->location;
            $event->tags = $request->tags;
            $event->save();
            if($request->hasFile('image')){
                if($event->image){
                    $oldImage = public_path('images/projects/events/'.$event->image);
                    if(file_exists($oldImage)){
                        unlink($oldImage);
                    }
                }
                $image = $request->file('image');
                $newName = Str::slug($event->slug).Str::random(5).'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/projects/events/'.$newName);
                Image::make($image)->save($destination);
                $event->image = $newName;
                $event->save();
            }
            return redirect()->route('events.index')->with('success','events updated!');
        }else{
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->can('event management')){
            $event = Events::find($id);
            $event->delete();
            return back()->with('success','Event Deleted!');
        }else{
            abort(404);
        }
    }
}
