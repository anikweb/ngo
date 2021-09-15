<?php

namespace App\Http\Controllers;

use App\Models\generalSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('general settings')){

            return view('backend.pages.settings.general.index',[
                'gSettings' =>generalSetting::first(),
                'roles' => Role::orderBy('name', 'asc')->get(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\generalSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(generalSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\generalSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(generalSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\generalSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, generalSetting $generalSetting)
    {
        if(auth()->user()->can('general settings')){

            $request->validate([
                'site_title' => 'required',
                'tagline' => 'required',
                'admin_email' => 'required',
                'new_user_role' => 'required',
                'timezone' => 'required',
                'date_format' => 'required',
                'time_format' => 'required',
            ]);
            // return $request;
            if($generalSetting->site_title != $request->site_title || $generalSetting->tagline != $request->tagline || $generalSetting->admin_email != $request->admin_email || $generalSetting->membership != $request->membership || $generalSetting->new_user_role != $request->new_user_role || $generalSetting->timezone != $request->timezone || $generalSetting->date_format != $request->date_format || $generalSetting->time_format != $request->time_format || $request->hasFile('logo') || $request->hasFile('icon')){

                $generalSetting->site_title = $request->site_title;
                if($request->hasFile('logo')){
                    $oldLogo = public_path('images/generalSettings/'.$generalSetting->logo);
                    if(file_exists($oldLogo)){
                        unlink($oldLogo);
                    }
                    $image = $request->file('logo');
                    $newName = Str::slug($request->site_title).'-logo'.'.'.$image->getClientOriginalExtension();
                    $destination = public_path('images/generalSettings/'.$newName);
                    Image::make($image)->save($destination);
                    $generalSetting->logo = $newName;
                }
                if($request->hasFile('icon')){
                    $oldIcon = public_path('images/generalSettings/'.$generalSetting->icon);
                    if(file_exists($oldIcon)){
                        unlink($oldIcon);
                    }
                    $icon = $request->file('icon');
                    $newName = Str::slug($request->site_title).'-icon'.'.'.$icon->getClientOriginalExtension();
                    $destination = public_path('images/generalSettings/'.$newName);
                    Image::make($icon)->save($destination,70);
                    $generalSetting->icon = $newName;
                }
                $generalSetting->tagline = $request->tagline;
                $generalSetting->admin_email = $request->admin_email;

                if($request->membership){
                    $generalSetting->membership = $request->membership;
                }else{
                    $generalSetting->membership = 1;
                }

                $generalSetting->new_user_role = $request->new_user_role;
                $generalSetting->timezone = $request->timezone;
                $generalSetting->date_format = $request->date_format;
                $generalSetting->time_format = $request->time_format;
                if($generalSetting->save()){
                    return back()->with('success','General Settings Updated!');
                }else{
                    return back()->with('error','Failed to updated General Settings!');

                }
            }else{
                return back()->with('error','You did not make any change!');
            }

        }else{
            abort(404);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\generalSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(generalSetting $generalSetting)
    {
        //
    }

}
