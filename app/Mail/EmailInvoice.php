<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $service;
    public $items;

    public function __construct($service, $items)
    {
        $this->service = $service;
        $this->items = $items;
    }

    public function build()
    {
        return $this->view('email.templateInvoice')->with([
            'service' => $this->service,
            'items'   => $this->items,
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address("j-ar-8@hotmail.com"),
            subject: 'Ing. Mecanica Rubio',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.templateInvoice',
        );
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
