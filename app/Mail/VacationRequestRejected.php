<?php
use Illuminate\Mail\Mailable;

class VacationRequestRejected extends Mailable
{
    protected $request;

    public function __construct(VacationRequest $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        return $this->subject('Vacation Request Rejected')
                    ->view('emails.vacation_request_rejected', ['request' => $this->request]);
    }
}
