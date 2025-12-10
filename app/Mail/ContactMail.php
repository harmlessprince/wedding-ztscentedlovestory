<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->subject = "You’re Officially Invited to Our ZTscentedlovestory";
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'rsvp-email-original',
            with: ['data' => $this->data],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = $this->data['invite_card_url'] ? [
            Attachment::fromUrl($this->data['invite_card_url'])
                ->as('Wedding-Invitation.png')
                ->withMime('image/png') // Good practice to specify MIME type
        ] : [];

        // --- 1. Generate the ICS attachment ---
        $icsAttachment = $this->generateIcsAttachment();
        if ($icsAttachment) {
            $attachments[] = $icsAttachment;
        }

        return $attachments;
    }

    protected function generateIcsAttachment(): ?Attachment
    {
        $nigeriaTimezone = new \DateTimeZone('Africa/Lagos');
        // Convert data strings to DateTime objects (required by the package)
        $startDate = new \DateTime('2026-02-07 10:00:00', $nigeriaTimezone);
        $endDate = new \DateTime('2026-02-07 18:00:00', $nigeriaTimezone);
        $reminderAlert = new \DateTime('2026-02-01 10:00:00', $nigeriaTimezone);
        $title = 'Aqid and Walimatun Nikah of Taofeeq Olamilekan & Zuliat Ololade';
        $description = sprintf("
        We are truly honored to have you confirm your presence at our Aqid and Walimatun Nikah .
        Your presence means a lot to us, and we can't wait to share this blessed moment of love, faith, and togetherness with you.
        Please join us as we celebrate our ZTscentedlovestory , a union filled with serenity, gratitude, and the fragrance of barakah (blessing).

        Your Invitation Code: %s



        Event Details:
        * Date: Feb 7, 2026
        * Location: Comfort Event Center, Olorunleke bus stop, Lagos, Badagry Expressway.
        * Time: 10:00am
        * Dress Code: Modest
        * Location: Comfort Event Center, Olorunleke bus stop, Lagos, Badagry Expressway.
      ", $this->data['invite_code']);

        $location = 'Comfort Event Center, Olorunleke bus stop, Lagos, Badagry Expressway.';

        // 2. Create the Event object
        $event = Event::create($title)
            ->organizer('realolamilekan@gmail.com', 'ZTscentedlovestory')
            ->alertAt($reminderAlert, 'Aqid and Walimatun Nikah of Taofeeq Olamilekan & Zuliat Ololade is in one week time, we look forward to sharing this beautiful day with you.')
            ->alertMinutesBefore(120, 'Aqid and Walimatun Nikah of Taofeeq Olamilekan & Zuliat Ololade is going to start in 2 hours, drive and move safely')
            ->alertMinutesAfter(120, 'Aqid and Walimatun Nikah of Taofeeq Olamilekan & Zuliat Ololade has ended, we hope you had a great time, thank you so much for celebrating our ZTscentedlovestory.')
            ->startsAt($startDate)
            ->endsAt($endDate)
            ->description($description)
            ->address($location);

        // 3. Create the Calendar object and add the event
        $calendar = Calendar::create('ZTscentedlovestory') // Calendar Name/Organizer
        ->refreshInterval(5)
            ->event($event);

        // 4. Get the raw ICS content (string)
        $icsContent = $calendar->get();

        // 5. Return a raw data attachment (not from a file)
        return Attachment::fromData(fn() => $icsContent, 'ztscentedlovestory.ics')
            ->withMime('text/calendar');
    }
}
