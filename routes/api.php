<?php

use App\Http\Controllers\PaystackWebhookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use App\Jobs\ProcessInvitationJob;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;


Route::post('/get-ticket', function (Request $request) {

//    \Illuminate\Support\Facades\Log::info($request->all());
    $validated = $request->validate([
        'surname' => 'required|string',
        'first_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'children_count' => 'nullable|integer',
        'message' => 'nullable|string',
        'captcha' => 'nullable|string',
        'side' => 'required|string|in:GROOM,BRIDE',
    ]);


    $captcha = $validated['captcha'];
    $score = RecaptchaV3::verify($captcha, 'register');
//    if ($score < 0.5) {
//        return response()->json([
//            'success' => false,
//            'message' => 'You are most likely a bot, kindly refresh the page and try again.',
//        ]);
//    }
    unset($validated['captcha']);
    $rsvp = Rsvp::query()->where('phone', $validated['phone'])->first();
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


Route::get('/get-ticket/{code}', function (Request $request, $code) {


    $rsvp = Rsvp::query()->where('invite_code', $code)->orWhere('phone', $code)->first();
    if (!$rsvp) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid inviation code',
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Your reservation has been confirmed and your IV will be sent to your email shortly.',
        'invitation_code' => $rsvp->invite_code,
        'invite_name' => strtoupper($rsvp->first_name),
        'invite_card_url' => $rsvp->invite_card_url,
    ]);
})->name('get-ticket-b-code');
Route::post(
    '/webhooks/paystack',
    [PaystackWebhookController::class, 'handle']
)->name('webhooks.paystack');


Route::post('transaction/initialize', [TransactionController::class, 'initialize']);
Route::post('transaction/confirm', [TransactionController::class, 'confirm']);
