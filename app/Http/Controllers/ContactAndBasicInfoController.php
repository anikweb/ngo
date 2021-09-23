<?php

namespace App\Http\Controllers;

use App\Models\ContactAndBasicInfo;
use App\Models\SocialPlatform;
use Illuminate\Http\Request;

class ContactAndBasicInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.contact_and_basic_info.index',[
            'socialPlatforms' => SocialPlatform::orderBy('name','asc')->get(),
        ]);
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
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ContactAndBasicInfo $contactAndBasicInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactAndBasicInfo $contactAndBasicInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactAndBasicInfo $contactAndBasicInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactAndBasicInfo  $contactAndBasicInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactAndBasicInfo $contactAndBasicInfo)
    {
        //
    }
}
