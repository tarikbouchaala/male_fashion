<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Newsletter Subscription Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pages.emails.newsletter',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array

     */
    public function attachments(): array
    {
        $imagePath1 = public_path('img/email/Welcome_Email.png');
        $imagePath3 = public_path('img/email/white_down.png');
        $imagePath2 = public_path('img/email/logo.png');

        return [
            Attachment::fromPath($imagePath1),
            Attachment::fromPath($imagePath2),
            Attachment::fromPath($imagePath3),
        ];
    }
}
