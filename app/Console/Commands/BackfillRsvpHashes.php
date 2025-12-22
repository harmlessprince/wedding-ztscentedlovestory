<?php

namespace App\Console\Commands;

use App\Models\Rsvp;
use Illuminate\Console\Command;

class BackfillRsvpHashes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rsvp:backfill-hashes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates identity_hash and hash for existing RSVP records';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rsvps = Rsvp::all();
        $this->info("Processing " . $rsvps->count() . " records...");

        $bar = $this->output->createProgressBar($rsvps->count());
        $bar->start();

        foreach ($rsvps as $rsvp) {
            // 1. Generate Identity Hash (Name + Email)
            $identityHashSource = strtolower($rsvp->first_name . '|' . $rsvp->surname . '|' . $rsvp->email);
            $rsvp->identity_hash = hash('sha256', $identityHashSource);

            // 2. Generate Full Hash (Name + Email + Phone)
            $hashSource = strtolower($rsvp->first_name . '|' . $rsvp->surname . '|' . $rsvp->email . '|' . $rsvp->phone);
            $rsvp->hash = hash('sha256', $hashSource);

            $rsvp->save();
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Hashes updated successfully!');
    }
}
