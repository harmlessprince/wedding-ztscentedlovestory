<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRsvpHash
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $hash = $request->query('hash'); // expecting URL like /rsvp-confirmation?hash=abc123

        if (!$hash || !Rsvp::where('hash', $hash)->exists()) {
            return redirect('/'); // or any page you want
        }

        return $next($request);
    }
}
