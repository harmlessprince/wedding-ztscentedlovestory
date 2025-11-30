<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use App\Models\Rsvp;
use App\Services\InvitationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Random\RandomException;

class ProcessInvitationJob implements ShouldQueue
{
    use Queueable;

    private string $hash;

    /**
     * Create a new job instance.
     */
    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * Execute the job.
     * @throws RandomException
     */
    public function handle(): void
    {
        $local_url = null;
        try {
            // Check if record exists
            $rsvp = Rsvp::query()->where('hash', $this->hash)->first();
            if (!$rsvp) {
                Log::error("RSVP not found with hash: {$this->hash}");
                return;
            }

            if ($rsvp->invite_card_url) {
                Mail::to($rsvp->email)->send(new ContactMail($rsvp->toArray()));
            } else {
                $attachment = InvitationService::generateInvitation($rsvp->first_name);
                $local_url = $attachment['local_url'];
                $rsvp->invite_card_url = $attachment['cloud_url'];
                $rsvp->save();
                Mail::to($rsvp->email)->send(new ContactMail($rsvp->toArray()));
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        } finally {
            if ($local_url && file_exists($local_url)) {
                if (@unlink($local_url)) {
                    Log::info("Unlinked file: {$local_url}");
                } else {
                    Log::error("Failed to unlink file: {$local_url}");
                }
            }
        }
    }
}
