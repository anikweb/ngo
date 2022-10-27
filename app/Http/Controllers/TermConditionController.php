<?php

namespace App\Http\Controllers;

use App\Models\TermCondition;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.terms.index',[
            "terms" => TermCondition::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.terms.create');
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
            'term' => "required|string|unique:term_conditions,term",
            'description' => "required|string|unique:term_conditions,description",
        ]);
        $terms = new TermCondition;
        $terms->term = $request->term;
        $terms->description = $request->description;

        if($terms->save()){
            return redirect()->route('terms.index')->with('success','New terms and condition added successfull!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermCondition $termCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {

        $term = TermCondition::find($request);
        return view('backend.pages.terms.edit',[
            'term' => $term,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'term' => "required|string|unique:term_conditions,term,".$request->id,
            'description' => "required|string|unique:term_conditions,description,".$request->id,
        ]);
        $term = TermCondition::findOrFail($request->id);
        $term->term = $request->term;
        $term->description = $request->description;
        if($term->save()){
            return redirect()->route('terms.index')->with('success','Term and condition successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        $term = TermCondition::find($request);
        if($term->delete()){
            return redirect()->route('terms.index')->with('success','Term and Condition Deleted Successfull');
        }
    }
}
