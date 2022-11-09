<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;

class DonationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $pdf ;
    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // return $this->subject('Volunteer Application to MBF')->view('frontend.volunteers.mail',[
        //     'details' => $this->volunteer,
        // ])->attachData($this->pdf->output(), 'stock_report.pdf');

        return $this->from(env('MAIL_FROM_ADDRESS'))
               ->subject('Donation Success for Muktir Bondhon Foundation')
               ->view('frontend.donation.mail')
               ->attachData($this->pdf->output(), 'Donation.pdf');
    }
}
