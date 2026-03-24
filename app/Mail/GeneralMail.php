<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class GeneralMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $subjectText;
    public string $bodyText;
    public ?string $buttonUrl;
    public ?string $buttonText;
    public ?string $otp;

    public function __construct(string $subject, string $body, ?string $buttonUrl = null, ?string $buttonText = null, ?string $otp = null)
    {
        $this->subjectText = $subject;
        $this->bodyText = $body;
        $this->buttonUrl = $buttonUrl;
        $this->buttonText = $buttonText;
        $this->otp = $otp;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subjectText
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'admin.emails.general',
            with: [
                'body' => $this->bodyText,
                'buttonUrl' => $this->buttonUrl,
                'buttonText' => $this->buttonText,
                'otp' => $this->otp
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}