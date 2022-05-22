<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.projects.index',[
            'projects' => Project::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.projects.create');
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
            'title'=> 'required|max:50',
            'description'=> 'required|max:1000',
            'image'=> 'required|mimes:jpg,jpeg,png,webp',
        ]);
        $project = new Project();
        $project->title =$request->title;
        $project->slug =Str::slug($request->title);
        $project->description =$request->description;
        $project->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = Str::slug($project->title).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/projects/'.$newName);
            Image::make($image)->save($destination);
            $project->featured_image = $newName;
            $project->save();
        }
        return redirect()->route('projects.index')->with('success','Project Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('backend.pages.projects.show',[
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('backend.pages.projects.edit',[
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'=> 'required|max:50',
            'description'=> 'required|max:1000',
        ]);
        if($request->hasFile('image')){
            $request->validate([
                'image'=> 'required|mimes:png,jpg,webp,jpeg',
            ]);
        }
        $project->title =$request->title;
        $project->slug = Str::slug($request->title);
        $project->description =$request->description;
        $project->save();
        if($request->hasFile('image')){
            if($project->featured_image){
                $oldImage = public_path('images/projects/'.$project->featured_image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }
            $image = $request->file('image');
            $newName = Str::slug($project->title).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/projects/'.$newName);
            Image::make($image)->save($destination);
            $project->featured_image = $newName;
            $project->save();
        }
        return redirect()->route('projects.index')->with('success','Project Updated!');
    }
    public function multipleImageCreate($slug){
        $project = Project::where('slug',$slug)->first();
        return view('backend.pages.projects.multiple_image',compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success','Project moved to trash');
    }
    public function multipleImageUpdate(Request $request)
    {

        if($request->hasFile('gallery')){
            $size = 0;
            foreach ($request->file('gallery') as $image) {
                $ext = $image->getClientOriginalExtension();
                $valid_ext = ['jpg','jpeg','png','webp'];
                if(!in_array($ext, $valid_ext)){
                    return back()->with('validation_error','Uploaded file only suport jpg, jpeg, png or webp');
                }
                $size += $image->getSize();
            }
            if($size < 10485760){
                $loopKey = 0;
                foreach ($request->file('gallery') as $key => $image) {
                    $loopKey += $key;
                    $project = Project::where('slug',$request->project_slug)->first();
                    $projectGallery = new ProjectImageGallery;
                    $newName = Str::slug($project->title).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
                    $path = public_path('images/projects/image_gallery/').$project->slug.'/';
                    File::makeDirectory($path, $mode = 0777, true, true);
                    Image::make($image)->save($path.$newName);
                    $projectGallery->project_id = $project->id;
                    $projectGallery->image = $newName;
                    $projectGallery->save();
                }
                if($loopKey > 0){
                    return back()->with('success','New Images Added!');
                }else{
                    return back()->with('success','New Image Added!');
                }
            }else{
                return back()->with('validation_error','Uploaded file can not longer than 10MB');
            }

        }
    }
}
