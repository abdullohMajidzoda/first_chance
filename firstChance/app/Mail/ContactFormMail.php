<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $cv;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $cv)
    {
        $this->data = $data;
        $this->cv = $cv;
    }

    public function build(){
        return $this->subject('Новое сообщение с формы')->view('emails.contact-form')->attach($this->cv->getRealPath(), ['as' => 'Резюме.' . $this->cv->getClientOriginalExtension(),'mime' => $this->cv->getMimeType(),]);
    }



    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Contact Form Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
