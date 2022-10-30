<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('faq management')){
            return view('backend.pages.faq.index',[
                'faqs' => FAQ::latest()->paginate(10),
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
        if(auth()->user()->can('faq management')){
            return view('backend.pages.faq.create');
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
        if(auth()->user()->can('faq management')){
            $request->validate([
                'question' => "required|string|unique:f_a_q_s,question",
                'answer' => "required|string|unique:f_a_q_s,answer",
            ]);
            $faq = new FAQ();
            $faq->question = Str::finish($request->question,'?');
            $faq->answer = $request->answer;

            if($faq->save()){
                return redirect()->route('faq.index')->with('success','New FAQ added successfull!');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit($request)
    {
        if(auth()->user()->can('faq management')){
            $faq = FAQ::find($request);
            return view('backend.pages.faq.edit',[
                'faq' => $faq,
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(auth()->user()->can('refund policy')){
            $request->validate([
                'question' => "required|string|unique:f_a_q_s,question,".$request->id,
                'answer' => "required|string|unique:f_a_q_s,answer,".$request->id,
            ]);
            $faq = FAQ::findOrFail($request->id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            if($faq->save()){
                return redirect()->route('faq.index')->with('success','FAQ Updated');
            }
        }else{
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        if(auth()->user()->can('faq management')){
            $faq = FAQ::find($request);
            if($faq->delete()){
                return redirect()->route('faq.index')->with('success','FAQ Deleted Successfull');
            }
        }else{
            return abort(404);
        }
    }
}
