<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;



class General extends Mailable
{
    use Queueable, SerializesModels;
    public $emailData=[];

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->emailData['email']=$data['email'];
        $this->emailData['type']=$data['type'];
        $this->emailData['code'] =  $data['code'];
        $this->emailData['role']= isset($data['role']) ? $data['role'] : null;
        $this->emailData['to']= isset($data['to']) ? $data['to'] : null;
        $this->emailData['user'] = isset($data['user']) ? $data['user'] : null;
        $this->emailData['user_birth_date'] = isset($data['user_birth_date']) ? $data['user_birth_date'] : null;
       
   
    }

        /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        if($this->emailData['type'] == 'welcome') return new Envelope(subject: 'ترحيب بك في موقع لدعم القضية الفلسطينية');
        
        if($this->emailData['type'] == 'check-code') return new Envelope(subject: 'Check Code');

        // Return a default envelope or handle unexpected types
        return new Envelope(subject: 'Default Subject');
    }

    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->emailData['type'] == 'welcome') return $this->view('emails.welcome-user')->subject('WelcomeUser')->with($this->emailData);
        
        if($this->emailData['type'] == 'check-code')  return $this->view('emails.check-code')->subject('CheckCode')->with($this->emailData);

    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if($this->emailData['type'] == 'welcome'){
            if($this->emailData['to'] == 'user') return new Content(view: 'emails.welcome-user');
        }
        if($this->emailData['type'] == 'check-code')  return new Content(view: 'emails.check-code');
        
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
