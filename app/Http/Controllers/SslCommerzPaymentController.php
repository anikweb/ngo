<?php

namespace App\Http\Controllers;
use App\Mail\DonationConfirmationMail;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Project;
use App\Models\userDonation;
use Illuminate\Support\Facades\Session;
use Mail;
use PDF;
class SslCommerzPaymentController extends Controller
{



    public function index(Request $request)
    {
        // return 'ok';
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        if($request->projectCustom){
            Session::put('donateProject',$request->projectCustom);
        }else{
            Session::put('donateProject',$request->project);
        }
        Session::put('donateAmount',$request->amount);
        if($request->comment){
            Session::put('donateComment',$request->comment);
        }
        // Validation
        $request->validate([
            'name' => "required",
            'email' => "required",
            'contact' => "required",
        ]);

        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = $request->currency;
        $post_data['tran_id'] = "MBF".time(); // tran_id must be unique

        // $post_data['cus_comment'] = $request->comment;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "";
        $post_data['cus_phone'] = $request->contact;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "online";
        $post_data['ship_add1'] = "";
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = "";
        $post_data['ship_state'] = "";
        $post_data['ship_postcode'] = "";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "";

        $post_data['shipping_method'] = "NO";

        if($request->projectCustom){
            $post_data['product_name'] = "Donation for".$request->projectCustom;
        }else{
            $project = Project::find($request->project);
            $post_data['product_name'] = "Donation for".$project->title;
        }

        $post_data['product_category'] = "donation";
        $post_data['product_profile'] = "general";

        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b'] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.


        $donation = new userDonation();

        $donation->name =  $post_data['cus_name'];
        $donation->email =  $post_data['cus_email'];
        $donation->phone =  $post_data['cus_phone'];
        $donation->amount =  $post_data['total_amount'];
        $donation->status =  "Pending";
        $donation->address =  $post_data['cus_add1'];
        $donation->transaction_id =  $post_data['tran_id'];
        $donation->currency =  $post_data['currency'];
        if($request->projectCustom){
            $donation->custom_project =  $request->projectCustom;
        }else{
            $donation->project_id =  $request->project;
        }
        $donation->comment =  $request->comment;
        $donation->type =  1;
        $donation->save();

        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $post_data['total_amount'],
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');
        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
    public function payViaAjax(Request $request)
    {

        if($request->projectCustom){
            Session::put('donateProject',$request->projectCustom);
        }else{
            Session::put('donateProject',$request->project);
        }
        Session::put('donateAmount',$request->amount);
        if($request->comment){
            Session::put('donateComment',$request->comment);
        }
        // Validation

        $request->validate([
            'name' => "required",
            'email' => "required",
            'contact' => "required",
        ]);

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = $request->currency;
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "";
        $post_data['cus_phone'] = $request->contact;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "";
        $post_data['ship_add1'] = "";
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = "";
        $post_data['ship_state'] = "";
        $post_data['ship_postcode'] = "";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Donation for".$request->projectCustom;
        $post_data['product_category'] = "Donation";
        $post_data['product_profile'] = "general";

        # OPTIONAL PARAMETERS
        // $post_data['value_a'] = "ref001";
        // $post_data['value_b'] = "ref002";
        // $post_data['value_c'] = "ref003";
        // $post_data['value_d'] = "ref004";
        // return 'ok';
        #Before  going to initiate the payment order status need to update as Pending.
        $donation = new userDonation();
        $donation->name =  $post_data['cus_name'];
        $donation->email =  $post_data['cus_email'];
        $donation->phone =  $post_data['cus_phone'];
        $donation->amount =  $post_data['total_amount'];
        $donation->status =  "Pending";
        $donation->address =  $post_data['cus_add1'];
        $donation->transaction_id =  $post_data['tran_id'];
        $donation->currency =  $post_data['currency'];
        if($request->projectCustom){
            $donation->custom_project =  $request->projectCustom;
        }else{
            $donation->project_id =  $request->project;
        }
        $donation->comment =  $post_data['cus_comment'];
        $donation->type =  1;
        $donation->save();
        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $post_data['total_amount'],
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');
        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
    public function success(Request $request)
    {
        // echo "Transaction is Successful";
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $sslc = new SslCommerzNotification();
        #Check order status in order tabel against the transaction id or order id.
        $donation_details = userDonation::where('transaction_id',$tran_id)->first();
        // $order_detials = DB::table('orders')
        //     ->where('transaction_id', $tran_id)
        //    ->select('transaction_id', 'status', 'currency', 'amount')->first();
        if ($donation_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);
            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_donation = userDonation::where('transaction_id',$tran_id)->first();
                $update_donation->status = "Complete";
                if($update_donation->save()){
                    // Mail with pdf
                    $userDonation = $update_donation;
                    $pdf = PDF::loadView('frontend.donation.pdf',compact('userDonation'))->setPaper('a4', 'portrait');
                    $to_email = $update_donation->email;
                    Mail::to($to_email)->send(new DonationConfirmationMail($pdf));
                    return redirect()->route('frontend.donate.success',$tran_id);
                }else{
                    $cause = 'Transaction Failed';
                    return redirect()->route('frontend.donate.failed',$cause);
                }
                // $update_product = DB::table('orders')
                //     ->where('transaction_id', $tran_id)
                //     ->update(['status' => 'Processing']);
                // echo "<br >Transaction is successfully Completed";
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_donation = userDonation::where('transaction_id',$tran_id)->first();
                $update_donation->status = "Failed";
                if($update_donation->save()){
                    $cause = 'Validation Error';
                    return redirect()->route('frontend.donate.failed',$cause);
                }
                // $update_product = DB::table('orders')
                //     ->where('transaction_id', $tran_id)
                //     ->update(['status' => 'Failed']);
                // echo "validation Fail";
            }
        } else if ($donation_details->status == 'Processing' || $donation_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            return redirect()->route('frontend.donate.success',$tran_id);
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            $cause = 'Invalid Transaction';
            return redirect()->route('frontend.donate.failed',$cause);
        }
    }
    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $donation_details = userDonation::where('transaction_id',$tran_id)->first();
        // $order_detials = DB::table('orders')
        //     ->where('transaction_id', $tran_id)
        //     ->select('transaction_id', 'status', 'currency', 'amount')->first();
        if ($donation_details->status == 'Pending') {

            // $update_product = DB::table('orders')
            //     ->where('transaction_id', $tran_id)
            //     ->update(['status' => 'Failed']);
            $cause = 'Transaction Failed';
            return redirect()->route('frontend.donate.failed',$cause);
        } else if ($donation_details->status == 'Processing' || $donation_details->status == 'Complete') {
            return redirect()->route('frontend.donate.success',$tran_id);
        } else {
            $cause = 'Invalid Transaction';
            return redirect()->route('frontend.donate.failed',$cause);
        }
    }
    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $donation_details = userDonation::where('transaction_id',$tran_id)->first();
        if($donation_details->status == "Pending"){
            $donation_details->status = "Canceled";
            $donation_details->save();

            $cause = 'Your donation has been cancelled.';
            return redirect()->route('frontend.donate.failed',$cause);
        }elseif($donation_details->status == 'Processing' || $donation_details->status == 'Complete'){
            // echo "Transaction is already Successful";
            return redirect()->route('frontend.donate.success',$tran_id);

        }else{
            $cause = 'Invalid Transaction.';
            return redirect()->route('frontend.donate.failed',$cause);
        }
        // $order_detials = DB::table('orders')
        //     ->where('transaction_id', $tran_id)
        //     ->select('transaction_id', 'status', 'currency', 'amount')->first();

        // if ($order_detials->status == 'Pending') {
        //     $update_product = DB::table('orders')
        //         ->where('transaction_id', $tran_id)
        //         ->update(['status' => 'Canceled']);
        //     echo "Transaction is Cancel";
        // } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
        //     echo "Transaction is already Successful";
        // } else {
        //     echo "Transaction is Invalid";
        // }
    }
    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {
            $tran_id = $request->input('tran_id');
            $donation_details = userDonation::where('transaction_id',$tran_id)->first();
            if($donation_details->status == 'Pending'){
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $donation_details->amount, $donation_details->currency);
                if ($validation == TRUE) {
                     /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_donation = userDonation::where('transaction_id',$tran_id)->first();
                    $update_donation->status = "Complete";
                    $update_donation->save();
                    // echo "Transaction is successfully Completed";
                    return redirect()->route('frontend.donate.success',$tran_id);
                }else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_donation = userDonation::where('transaction_id',$tran_id)->first();
                    $update_donation->status = "Failed";
                    $cause = 'validation Fail.';
                    return redirect()->route('frontend.donate.failed',$cause);
                }

            }else if ($donation_details->status == 'Processing' || $donation_details->status == 'Complete') {
                #That means Order status already updated. No need to update database.
                // echo "Transaction is already successfully Completed";
                return redirect()->route('frontend.donate.success',$tran_id);
            }else {
                #That means something wrong happened. You can redirect customer to your product page.
                $cause = 'Invalid Transaction.';
                return redirect()->route('frontend.donate.failed',$cause);
            }
        } else {

                $cause = 'Invalid Data.';
                return redirect()->route('frontend.donate.failed',$cause);
        }
            #Check order status in order tabel against the transaction id or order id.
            // $order_details = DB::table('orders')
            //     ->where('transaction_id', $tran_id)
            //     ->select('transaction_id', 'status', 'currency', 'amount')->first();
            // if ($order_details->status == 'Pending') {
            //     $sslc = new SslCommerzNotification();
            //     $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
        //         if ($validation == TRUE) {
        //             /*
        //             That means IPN worked. Here you need to update order status
        //             in order table as Processing or Complete.
        //             Here you can also sent sms or email for successful transaction to customer
        //             */
        //             $update_product = DB::table('orders')
        //                 ->where('transaction_id', $tran_id)
        //                 ->update(['status' => 'Processing']);

        //             echo "Transaction is successfully Completed";
        //         } else {
        //             /*
        //             That means IPN worked, but Transation validation failed.
        //             Here you need to update order status as Failed in order table.
        //             */
        //             $update_product = DB::table('orders')
        //                 ->where('transaction_id', $tran_id)
        //                 ->update(['status' => 'Failed']);

        //             echo "validation Fail";
        //         }

        //     } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

        //         #That means Order status already updated. No need to udate database.

        //         echo "Transaction is already successfully Completed";
        //     } else {
        //         #That means something wrong happened. You can redirect customer to your product page.

        //         echo "Invalid Transaction";
        //     }
        // } else {
        //     echo "Invalid Data";
        // }
    }
}
