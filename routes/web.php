<?php

use App\Http\Middleware\ValidateRsvpHash;
use App\Jobs\ProcessInvitationJob;
use App\Models\Rsvp;
use App\Services\InvitationService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Str;


Route::fallback(function () {
    return redirect('/'); // or any default URL
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/home', function () {
    return view('index');
})->name('home');


Route::get('/rsvp', function () {
    return view('rsvp');
})->name('rsvp');


Route::get('/rsvp-confirmation', function (Request $request) {
    $hash = $request->query('hash');
    $rsvp = \App\Models\Rsvp::where('hash', $hash)->first();
    return view('success', compact('rsvp'));
})->middleware(ValidateRsvpHash::class)->name('rsvp-confirmation');


Route::get('/order-of-event', function () {
    return view('order-of-events');
})->name('order-of-event');


Route::post('/contact', function (Request $request) {


    $validated = $request->validate([
        'surname' => 'required|string',
        'first_name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'message' => 'nullable|string',
        'side' => 'required|string|in:GROOM,BRIDE',
    ]);

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
        }else{
            $rsvp->invite_code = $inviteCode;
            $rsvp->save();
        }
        ProcessInvitationJob::dispatch($rsvp->hash);
    } else {
        Rsvp::create($validated);
        ProcessInvitationJob::dispatch($hash);
    }
    return redirect()->route('rsvp-confirmation', ['hash' => $hash, 'invite_code' => $inviteCode])
        ->with('message', 'Your reservation has been confirmed and your IV will be sent to you shortly.');
})->name('contact');
