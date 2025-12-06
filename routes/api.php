<?php

use App\Http\Controllers\PaystackWebhookController;
use App\Http\Controllers\WishlistController;
use App\Jobs\ProcessInvitationJob;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


Route::post('/get-ticket', function (Request $request) {

    \Illuminate\Support\Facades\Log::info($request->all());
    $validated = $request->validate([
        'surname' => 'required|string',
        'first_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'message' => 'nullable|string',
        'side' => 'required|string|in:GROOM,BRIDE',
    ]);

    $rsvp = Rsvp::query()->where('hash', $validated['phone'])->first();
    if ($rsvp) {
        return response()->json([
            'success' => false,
            'message' => 'Phone number already registered',
        ]);
    }

    $inviteCode = strtoupper(Str::random(4)) . "-" . random_int(1000, 9999);
    // Generate hash from surname, first name, email, phone
    $hashSource = $validated['surname'] . $validated['first_name'] . $validated['email'] . $validated['phone'];
    $hash = hash('sha256', $hashSource);
    $validated['hash'] = $hash;
    $validated['invite_code'] = $inviteCode;
    $rsvp = Rsvp::query()->where('hash', $validated['hash'])->first();
    if ($rsvp) {
        if ($rsvp->invite_code != null) {
            $inviteCode = $rsvp->invite_code;
        } else {
            $rsvp->invite_code = $inviteCode;
            $rsvp->save();
        }
        ProcessInvitationJob::dispatch($rsvp->hash);
    } else {
        Rsvp::create($validated);
        ProcessInvitationJob::dispatch($hash);
    }

    return response()->json([
        'success' => true,
        'message' => 'Your reservation has been confirmed and your IV will be sent to your email shortly.',
        'invitation_code' => $inviteCode,
        'invite_name' => strtoupper($validated['first_name']),
    ]);
})->name('get-ticket');


Route::post(
    '/webhooks/paystack',
    [PaystackWebhookController::class, 'handle']
)->name('webhooks.paystack');
