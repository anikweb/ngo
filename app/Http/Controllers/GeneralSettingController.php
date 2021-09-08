<?php

namespace App\Http\Controllers;

use App\Models\generalSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.settings.general.index');
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
        return $request;
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
        //
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
