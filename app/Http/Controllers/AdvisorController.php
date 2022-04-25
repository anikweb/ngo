<?php

namespace App\Http\Controllers;

use App\Models\advisor;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.team.advisors.index',[
            'advisors' => advisor::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.team.advisors.create');
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
            'name' => 'required|string',
        ]);
        $advisor = new advisor;
        $advisor->name = $request->name;
        $advisor->designation = $request->designation;
        $advisor->email = $request->email;
        $advisor->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newName = Str::slug($advisor->name).'-image-'.Str::random(5).'.'.$image->getClientOriginalExtension();
            $destination = public_path('images/advisors/'.$newName);
            Image::make($image)->save($destination);
            $advisor->image = $newName;
            $advisor->save();
        }
        return redirect()->route('advisors-settings.index')->with('success','Advisor added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function show(advisor $advisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function edit(advisor $advisor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, advisor $advisor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\advisor  $advisor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advisor = advisor::findOrFail($id);
        $advisor->delete();
        return back()->with('success','Advisor deleted!');
    }
}
