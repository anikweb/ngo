<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('privacy & policy')){
            return view('backend.pages.privacy.index',[
                'privacies' => PrivacyPolicy::latest()->paginate(10),
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
        if(auth()->user()->can('privacy & policy')){
            return view('backend.pages.privacy.create');
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
        if(auth()->user()->can('privacy & policy')){
            $request->validate([
                'title' => "required|string|unique:privacy_policies,title",
                'description' => "required|string|unique:privacy_policies,description",
            ]);
            $privacy = new PrivacyPolicy();
            $privacy->title = $request->title;
            $privacy->description = $request->description;

            if($privacy->save()){
                return redirect()->route('privacy.index')->with('success','New privacy & policy added successfull!');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        if(auth()->user()->can('privacy & policy')){
            $privacy = PrivacyPolicy::find($request);
            return view('backend.pages.privacy.edit',[
                'privacy' => $privacy,
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->can('privacy & policy')){
            $request->validate([
                'title' => "required|string|unique:privacy_policies,title,".$request->id,
                'description' => "required|string|unique:privacy_policies,description,".$request->id,
            ]);
            $privacy = PrivacyPolicy::findOrFail($request->id);
            $privacy->title = $request->title;
            $privacy->description = $request->description;
            if($privacy->save()){
                return redirect()->route('privacy.index')->with('success','Privacy & Policy Updated');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        if(auth()->user()->can('privacy & policy')){
            $privacy = PrivacyPolicy::find($request);
            if($privacy->delete()){
                return redirect()->route('privacy.index')->with('success','Privacy & Policy Deleted Successfull');
            }
        }else{
            return abort(404);
        }
    }
}
