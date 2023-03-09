<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $lead; // questa variabile ci serve per memorizzare meglio i dati che i nostri utenti inseriranno nel form infatti poi andrà richiamata nello store del ProjectController

    public function __construct($_lead)
    {
        $this->lead = $_lead;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope() // Tramite questo metodo ci occupiamo di definire i dettagli come: oggetto del messaggio ed indirizzo di risposta (replyTo)
    {
        return new Envelope(

            replyTo: 'info@boolpres.com',
            subject: 'Nuovo progetto',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content() // qui invece rimandiamo al template creato, che altro non è che come visualizzano la email
    {
        return new Content(
            view: 'admin.mails.mails_new_project',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
