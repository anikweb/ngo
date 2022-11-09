<?php

namespace App\Http\Controllers;


use App\Models\about;
use App\Models\Project;
use App\Models\userDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use PDF;

class UserDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = '')
    {
        if($slug){
            return view('frontend.donation.index',[
                'about' => about::first(),
                'projectSlug' => Project::where('slug',$slug)->first(),
                'projects' => Project::orderBy('title','DESC')->get(),
            ]);
        }else{
            return view('frontend.donation.index',[
                'about' => about::first(),
                'projects' => Project::orderBy('title','DESC')->get(),
            ]);
        }
    }
    public function donateInfo(Request $request){

        $validator = Validator::make($request->all(), [
            'project' => 'required',
            'amount' => 'required',
        ]);
        if($request->amount == "customAmountValue"){
           $validator = Validator::make($request->all(), [
                'amountCustom' => 'required|numeric',
            ]);
        }
        if($request->project == "custom_projectValue"){
           $validator = Validator::make($request->all(), [
                'projectCustom' => 'required|max:50',
            ]);
        }
        if($request->project == "custom_projectValue" && $request->amount == "customAmountValue"){
            $validator = Validator::make($request->all(), [
                 'projectCustom' => 'required|max:50',
                 'amountCustom' => 'required|numeric',
             ]);
        }
        if ($validator->passes()) {

            if(isset($request->projectCustom)){
                Session::put('donateProject',$request->projectCustom);
            }else{
                Session::put('donateProject',$request->project);
            }
            if(isset($request->amountCustom)){
                Session::put('donateAmount',$request->amountCustom);
            }else{
                Session::put('donateAmount',$request->amount);
            }
            Session::put('donateComment',$request->comment);

            return redirect()->route('frontend.donate.billing');

        }else{
            return back()->with('formErrors',$validator->errors()->all());
        }
    }


    public function billing(){

        if(Session::get('donateProject') && Session::get('donateAmount') && (previous_route() === 'frontend.donate.now' || previous_route() === 'frontend.donate.index' || previous_route() === 'frontend.donate.billing' )){
            if(Project::find(Session::get('donateProject'))){
                return view('frontend.donation.billing',[
                    'about' => about::first(),
                    'donateProject' =>  Project::find(Session::get('donateProject')),
                    'donateAmount' =>  Session::get('donateAmount'),
                    'donateComment' =>  Session::get('donateComment'),
                ]);
            }else{
                return view('frontend.donation.billing',[
                    'about' => about::first(),
                    'customProject' =>  Session::get('donateProject'),
                    'donateAmount' =>  Session::get('donateAmount'),
                    'donateComment' =>  Session::get('donateComment'),
                ]);

            }
        }else{
            return abort(404);
        }
    }

    // public function donateCheckout(Request $request){
    //     // Set Session
    //     if($request->projectCustom){
    //         Session::put('donateProject',$request->projectCustom);
    //     }else{
    //         Session::put('donateProject',$request->project);
    //     }
    //     Session::put('donateAmount',$request->amount);
    //     if($request->comment){
    //         Session::put('donateComment',$request->comment);
    //     }
    //     // Validation
    //     $request->validate([
    //         'name' => "required",
    //         'email' => "required",
    //         'contact' => "required",
    //     ]);
    //     return $request;

    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success($transaction_id){
        $userDonation = userDonation::where('transaction_id',$transaction_id)->first();
        // return response()->json(['status' => 'success', 'message' => 'Report has been sent successfully.']);
        return view('frontend.donation.success',[
            'about' => about::first(),
            'donation' => $userDonation,
        ]);

    }
    public function downloadPDF($tran_id){

        $userDonation = userDonation::where('transaction_id',$tran_id)->first();
        $pdf = PDF::loadView('frontend.donation.pdf',compact('userDonation'))->setPaper('a4', 'portrait');
        return $pdf->download('Donation for Muktir Bondhon Foundation.pdf');


    }
    public function failed($cause){
        return view('frontend.donation.failed',[
            'about' => about::first(),
            'cause' => $cause
        ]);
    }

    public function bankInfoIndex(){
        return view('frontend.donation.bank',[
            'about' => about::first(),
        ]);
    }
    public function create()
    {

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
     * @param  \App\Models\userDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function show(userDonation $userDonation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function edit(userDonation $userDonation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userDonation $userDonation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userDonation  $userDonation
     * @return \Illuminate\Http\Response
     */
    public function destroy(userDonation $userDonation)
    {
        //
    }
}
