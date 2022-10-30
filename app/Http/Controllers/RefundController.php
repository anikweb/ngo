<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('refund policy')){
            return view('backend.pages.refund.index',[
                'refunds' => Refund::latest()->paginate(10),
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
        if(auth()->user()->can('refund policy')){
            return view('backend.pages.refund.create');
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
        if(auth()->user()->can('refund policy')){
            $request->validate([
                'title' => "required|string|unique:refunds,title",
                'description' => "required|string|unique:refunds,description",
            ]);
            $refund = new Refund();
            $refund->title = $request->title;
            $refund->description = $request->description;

            if($refund->save()){
                return redirect()->route('refund.index')->with('success','New refund policy added successfull!');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        if(auth()->user()->can('refund policy')){
            $refund = Refund::find($request);
            return view('backend.pages.refund.edit',[
                'refund' => $refund,
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->can('refund policy')){
            $request->validate([
                'title' => "required|string|unique:refunds,title,".$request->id,
                'description' => "required|string|unique:refunds,description,".$request->id,
            ]);
            $refund = Refund::findOrFail($request->id);
            $refund->title = $request->title;
            $refund->description = $request->description;
            if($refund->save()){
                return redirect()->route('refund.index')->with('success','Refund Policy Updated');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        if(auth()->user()->can('refund policy')){
            $refund = Refund::find($request);
            if($refund->delete()){
                return redirect()->route('refund.index')->with('success','Refund Policy Deleted Successfull');
            }
        }else{
            return abort(404);
        }
    }
}
