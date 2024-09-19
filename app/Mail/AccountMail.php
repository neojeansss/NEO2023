<?php

namespace App\Mail;

use App\Models\Participant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public Participant $participant;

    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    public function build()
    {
        return $this->markdown('emails.accounts.mail')
                    ->subject('NEO 2023 - Participant Account Information');
    }
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Account Mail',
    //     );
    // }
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }
    // public function attachments(): array
    // {
    //     return [];
    // }
}
