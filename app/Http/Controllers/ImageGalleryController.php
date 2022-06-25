<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('media management')){
            return view('backend.pages.media.image_gallery.index',[
                'imageGalleries' => ImageGallery::latest()->paginate(30),
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
        if(auth()->user()->can('media management')){
            return view('backend.pages.media.image_gallery.create');
        }else{
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
        if(auth()->user()->can('media management')){
            if($request->hasFile('images')){
                $size = 0;
                foreach ($request->file('images') as $image) {
                    $ext = Str::lower($image->getClientOriginalExtension());
                    $valid_ext = ['jpg','jpeg','png','webp'];
                    if(!in_array($ext, $valid_ext)){
                        return back()->with('validation_error','Uploaded file only suport jpg, jpeg, png or webp');
                    }
                    $size += $image->getSize();
                }

                if($size < 10485760){
                    $loopKey = 0;
                    foreach ($request->file('images') as $key => $image) {
                        $loopKey += $key;
                        $ImageGallery = new ImageGallery();
                        $newName = 'Image-gallery'.Str::random(5).time().'.'.$image->getClientOriginalExtension();
                        $path = public_path('images/media/image_gallery/'.$newName);
                        Image::make($image)->save($path,60);
                        $ImageGallery->alt_text =  pathinfo($image->getClientOriginalname(),PATHINFO_FILENAME);
                        $ImageGallery->image = $newName;
                        $ImageGallery->save();
                    }
                    if($loopKey > 0){
                        return redirect()->route('image-gallery.index')->with('success','New Images Added!');
                    }else{
                        return redirect()->route('image-gallery.index')->with('success','New Image Added!');
                    }
                }else{
                    return back()->with('validation_error','Uploaded file can not longer than 10MB');
                }

            }else{
                return back()->with('validation_error','Please choose minimum one image to upload');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ImageGallery $imageGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageGallery $imageGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageGallery $imageGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageGallery  $imageGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $imageGallery)
    {
        //
    }
    public function getImage($id){
        if(auth()->user()->can('media management')){
            $img = ImageGallery::find($id);
            return response()->json($img);
        }else{
            return abort(404);
        }
    }
    public function updateImage(Request $request){
        if(auth()->user()->can('media management')){
            $image = ImageGallery::find($request->image_id);
            $image->alt_text = $request->alt_name;
            if($image->save()){
                return back()->with('success','Alt Name Saved');
            }else{
                return back()->with('error','Failed');
            }
        }else{
            return abort(404);
        }
    }
    public function updateTrash($id){
        if(auth()->user()->can('media management')){
            $image = ImageGallery::find($id);
            if($image->delete()){
                return back()->with('success','Image Moved to trash');
            }else{
                return back()->with('error','Failed');
            }
        }else{
            return abort(404);
        }
    }
    public function updateDeletePermanently($id){
        if(auth()->user()->can('media management')){
            $image = ImageGallery::find($id);
            $oldImage = public_path('images/media/image_gallery/'.$image->image);
            if($oldImage){
                unlink($oldImage);
                if($image->forceDelete()){
                    return back()->with('success','Image Moved to trash');
                }else{
                    return back()->with('error','Failed');
                }
            }else{
                return back()->with('error','Failed');
            }
        }else{
            return abort(404);
        }
    }
}
