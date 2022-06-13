<?php

namespace App\Http\Controllers;

use App\Models\Publications;
use App\Models\Project;
use Illuminate\Cache\RateLimiting\Unlimited;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.media.publications.index',[
            'publications' => Publications::latest()->paginate(12),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.media.publications.create',[
            'projects' => Project::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'headline' => "required",
            'url' => "required",
            'media' => "required",
            'published_date' => "required",
            'featured_image' => "required",
        ]);
        $publication = new Publications;
        $publication->headline = $request->headline;
        $publication->slug = Str::slug($request->headline);
        $publication->url = $request->url;
        $publication->project_id = $request->project_id;
        $publication->media = $request->media;
        $publication->published_date = $request->published_date;
        $publication->save();
        if($request->hasFile('featured_image')){

            $image = $request->file('featured_image');
            // return $image;
            $newName = Str::slug($request->headline).'-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/media/publications/'.$newName);
            // return 'hello';
            Image::make($image)->save($destination);
            $publication->featured_image = $newName;
            $publication->save();
        }
        return redirect()->route('publications.index')->with('success','Add new publication');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.pages.media.publications.show',[
            'publication' => Publications::find($id),
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('backend.pages.media.publications.edit',[
            'publication' => Publications::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'headline' => "required",
            'url' => "required",
            'media' => "required",
            'published_date' => "required",
        ]);

        $publication = Publications::find($request->publication_id);
        $publication->headline = $request->headline;
        $publication->slug = Str::slug($request->headline);
        $publication->url = $request->url;
        $publication->project_id = $request->project_id;
        $publication->media = $request->media;
        $publication->published_date = $request->published_date;
        $publication->save();

        if($request->hasFile('featured_image')){

            $oldImage = public_path('images/media/publications/'.$publication->featured_image);
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $image = $request->file('featured_image');
            $newName = Str::slug($request->headline).'-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/media/publications/'.$newName);
            Image::make($image)->save($destination);
            $publication->featured_image = $newName;
            $publication->save();
        }
        return redirect()->route('publications.index')->with('success','Add new publication');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publications  $publications
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publication = Publications::find($id);
        if($publication->featured_image){
            if(file_exists(public_path("images/media/publications/".$publication->featured_image))){
                unlink(public_path("images/media/publications/".$publication->featured_image));
            }
        }
        $publication->delete();
        return back()->with('success','Publication Deleted!');
    }
}
