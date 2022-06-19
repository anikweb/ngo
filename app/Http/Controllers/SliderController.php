<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('slider management'))
        {
            return view('backend.pages.sliders.index',[
                'sliders' => Slider::orderBy('priority','asc')->paginate(5),
                'sliders_priority' => Slider::orderBy('priority','asc')->get(),
            ]);
        }
        else
        {
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
        if(auth()->user()->can('slider management'))
        {
            return view('backend.pages.sliders.create');
        }
        else
        {
            return abort(404);
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
        if(auth()->user()->can('slider management'))
        {
            $request->validate([
                'title' => 'required|max:50',
                'subtitle' => 'required|max:50',
                'button_name' => 'max:15',
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
            $slider = new Slider;
            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->button_name = $request->button_name;
            $slider->button_link = $request->button_link;
            $slider->align = $request->align;
             // highest vallue of priority
             $exists_priority = Slider::all()->max('priority');
             $slider->priority = $exists_priority+1;
            $slider->save();
            if($request->hasFile('image')){
                // return 'aschi';
                $image = $request->file('image');
                $newName = Str::slug($slider->title).'-slider-'.Str::random(5).'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/sliders/'.$newName);
                // return 'hello';
                Image::make($image)->save($destination);
                $slider->image = $newName;
                $slider->save();
            }
            return redirect()->route('sliders.index')->with('success','Slider Added!');
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        if(auth()->user()->can('slider management'))
        {
            return view('backend.pages.sliders.show',[
                'slider' =>$slider,
            ]);
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        if(auth()->user()->can('slider management'))
        {
            return view('backend.pages.sliders.edit',[
                'slider' => $slider,
            ]);
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if(auth()->user()->can('slider management'))
        {
            $request->validate([
                'title' => 'required|max:50',
                'subtitle' => 'required|max:50',
                'button_name' => 'max:15',
                'image' => 'required|mimes:jpg,jpeg,png,webp',
            ]);
            $slider->title = $request->title;
            $slider->subtitle = $request->subtitle;
            $slider->button_name = $request->button_name;
            $slider->button_link = $request->button_link;
            $slider->align = $request->align;
            $slider->save();
            if($request->hasFile('image')){
                $oldImage = public_path('images/sliders/'.$slider->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('image');
                $newName = Str::slug($slider->title).'-slider-'.Str::random(5).'.'.$image->getClientOriginalExtension();
                $destination = public_path('images/sliders/'.$newName);
                // return 'hello';
                Image::make($image)->save($destination);
                $slider->image = $newName;
                $slider->save();
            }
            return redirect()->route('sliders.index')->with('success','Slider updated!');
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(auth()->user()->can('slider management'))
        {
            if($slider->image){
                $oldImage = public_path('images/sliders/'.$slider->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
            }
            $slider->delete();
            return redirect()->route('sliders.index')->with('success','Slider deleted!');
        }
        else
        {
            return abort(404);
        }
    }
    public function changePriority(Request $request){
        if(auth()->user()->can('slider management'))
        {
            $advisor = Slider::find($request->slider_id);
                if($advisor->priority == 1){
                    $exists_sliders = Slider::where('priority','<=',$request->priority)->get();
                    foreach ($exists_sliders as $key => $value) {
                        $exists_data = Slider::find($value->id);
                        $exists_data->priority =  $exists_data->priority-1;
                        $exists_data->save();
                    }
                }else{
                    $exists_sliders = Slider::where('priority','>=',$request->priority)->get();
                    foreach ($exists_sliders as $key => $value) {
                        $exists_data = Slider::find($value->id);
                        $exists_data->priority =  $exists_data->priority+1;
                        $exists_data->save();
                    }
                }
                $advisor->priority = $request->priority;
                $advisor->save();
                return back()->with('success','Slider priority changed!');
        }
        else
        {
            return abort(404);
        }
    }
}
