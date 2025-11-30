<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
    protected $fillable = [
        'surname',
        'first_name',
        'email',
        'phone',
        'side',
        'type',
        'message',
        'hash',
        'invite_card_url',
        'invite_code',
    ];
}
