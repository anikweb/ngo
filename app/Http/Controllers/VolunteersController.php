<?php

namespace App\Http\Controllers;

use App\Models\Volunteers;
use Illuminate\Http\Request;
use PDF;

class VolunteersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('volunteers management')){
            return view('backend.pages.volunteers.index',[
                'volunteers' => Volunteers::latest()->get(),
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
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->can('volunteers management')){
            $volunteer = Volunteers::find($id);
            $pdf = PDF::loadView('backend.pages.volunteers.show_pdf', compact('volunteer'))->setPaper('a4', 'portrait');
            return $pdf->stream($volunteer->applicant_id.'.pdf');
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteers $volunteers)
    {
        // return $volunteers;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->can('volunteers management')){
            if($request->action=='2'||$request->action=='3'||$request->action=='4'){
                $volunteer = Volunteers::find($request->volunteer_id);
                if($request->action == 2){
                    if(!$volunteer->volunteer_id){
                        $volunteer->volunteer_id = 'MBF-'.date('Y').$volunteer->id;
                    }
                }
                $volunteer->status = $request->action;
                if($volunteer->save()){
                    return back()->with('success','Status Changed!');
                }else{
                    return back()->with('error','Failed!');

                }
            }else{
                return back()->with('error','Failed!');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteers $volunteers)
    {
        //
    }
}
