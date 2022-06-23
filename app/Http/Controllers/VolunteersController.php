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
        return view('backend.pages.volunteers.index',[
            'volunteers' => Volunteers::latest()->paginate(10),
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteer = Volunteers::find($id);
        // return $volunteer->applicant_id;
        $pdf = PDF::loadView('backend.pages.volunteers.show_pdf', compact('volunteer'))->setPaper('a4', 'portrait');
        return $pdf->stream($volunteer->applicant_id.'.pdf');

        // $pdf = PDF::loadView(''.$id);
        // return $pdf->download('invoice.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteers $volunteers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteers  $volunteers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteers $volunteers)
    {
        //
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
