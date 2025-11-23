<?php

use App\Http\Middleware\ValidateRsvpHash;
use App\Models\Rsvp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\ContactMail;


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
        'message' => 'required|string',
        'side' => 'required|string|in:GROOM,BRIDE',
    ]);

    // Generate hash from surname, first name, email, phone
    $hashSource = $validated['surname'] . $validated['first_name'] . $validated['email'] . $validated['phone'];
    $hash = hash('sha256', $hashSource);

    // Check if record exists
    $rsvp = Rsvp::where('hash', $hash)->first();

    if ($rsvp) {
        // Record exists, send email
        Mail::to($validated['email'])->send(new ContactMail($rsvp->toArray()));
        return redirect()->route('rsvp-confirmation', ['hash' => $hash])
            ->with('message', 'RSVP submitted successfully and email sent.');
    }

    // Record does not exist, create it
    $validated['hash'] = $hash;
    $rsvp = Rsvp::create($validated);

    // Send email
    Mail::to($validated['email'])->send(new ContactMail($rsvp->toArray()));

    return redirect()->route('rsvp-confirmation', ['hash' => $hash])
        ->with('message', 'RSVP submitted successfully and email sent.');
})->name('contact');
