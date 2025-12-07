<?php

use App\Http\Middleware\ValidateRsvpHash;
use App\Jobs\ProcessInvitationJob;
use App\Models\Rsvp;
use App\Services\InvitationService;
use App\Services\WishlistService;
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

Route::get('/invitation', function () {
    return view('rsvp-email-original')->with(['data' => [
        'first_name' => "john",
    ]]);
})->name('invitation');

Route::get('/invitation-code', function () {
    return view('invitation_code');
})->name('invitation-code');


Route::get('/rsvp-confirmation', function (Request $request) {
    $hash = $request->query('hash');
    $rsvp = \App\Models\Rsvp::where('hash', $hash)->first();
    return view('success', compact('rsvp'));
})->name('rsvp-confirmation');


Route::get('/order-of-event', function () {
    return view('order-of-events');
})->name('order-of-event');


Route::get('/gift', function () {
    $wishlistService = new WishlistService();
    return view('gift')->with([
        'items' => $wishlistService->getAll()
    ]);
})->name('gift');

Route::get('/venue', function () {
    return view('venue');
})->name('venue');

Route::get('/payment-success', function () {
    $gratitudeMessages = [
        "Thank you so much for your gift!\n" .
        "We deeply appreciate your love and generosity.\n" .
        "May God bless you richly, replenish you, and meet you at every point of your need. ❤️",
        "Thank you for your thoughtful gift.\n" .
        "Your generosity has added joy to our special journey.\n" .
        "We are grateful, and we pray that abundance never departs from your home. ✨💍"
    ];
    $randomIndex = array_rand($gratitudeMessages);
    $randomMessage = $gratitudeMessages[$randomIndex];
    return view('success')->with([
        'message' => $randomMessage,
    ]);
})->name('success');

