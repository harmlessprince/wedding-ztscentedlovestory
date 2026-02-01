<?php

namespace App\Console\Commands;

use App\Jobs\ProcessInvitationJob;
use App\Models\Rsvp;
use Illuminate\Console\Command;

class DispatchMissingInvitations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invitations:dispatch-missing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch ProcessInvitationJob for RSVPs without an invite_card_url';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = now()->subDay(); // Exactly 24 hours ago

        // 1. Fetch RSVPs missing the URL and older than 24 hours
        $rsvps = Rsvp::query()
            ->where(function ($query) {
                $query->whereNull('invite_card_url')
                    ->orWhere('invite_card_url', '');
            })
            ->where('created_at', '<=', $cutoff) // Created 24+ hours ago
            ->get();

        if ($rsvps->isEmpty()) {
            $this->info('No pending invitations found.');
            return;
        }

        $this->info("Found {$rsvps->count()} RSVPs. Dispatching jobs...");

        // 2. Dispatch the job for each record
        $rsvps->each(function ($rsvp) {
            ProcessInvitationJob::dispatch($rsvp->hash);
            $this->line("Dispatched for: {$rsvp->email}");
        });

        $this->info('All jobs have been dispatched to the queue.');
    }
}

//php artisan invitations:dispatch-missing
