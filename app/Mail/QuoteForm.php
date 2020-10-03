<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\QuoteSubmission;

class QuoteForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The submission instance.
     *
     * @var QuoteSubmission
     */
    public $submission;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(QuoteSubmission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view( 'emails.quote' );
    }
}
