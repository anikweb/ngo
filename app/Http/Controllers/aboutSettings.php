<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class aboutSettings extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('general settings')){
            return view('backend.pages.about.index',[
                'about' => about::first(),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->can('general settings')){
            $request->validate([
                'cover_image' => 'image|mimes:png,jpg,svg,jpeg,webp',
                'about' => 'required',
                'mission' => 'required',
            ]);
            $about = about::findorFail($id);
            if($about->about == $request->about &&  $about->mission == $request->mission && !$request->hasFile('cover_image') ){
                return back()->with('error','you have not made any changes!');
            }
            $about->about = $request->about;
            $about->mission = $request->mission;
            $about->save();
            if($request->hasFile('cover_image')){
                // return 'hello';
                $oldImage = public_path('images/about/'.$about->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('cover_image');
                // return $image;
                $newName = Str::random(10).'cover-image'.'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/about/'.$newName);
                // return 'hello';
                Image::make($image)->save($destination);
                $about->image = $newName;
                $about->save();
                return back()->with('success','About Updated!');
            }
            return back()->with('success','About Updated!');
        }else{
            return abort(404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
