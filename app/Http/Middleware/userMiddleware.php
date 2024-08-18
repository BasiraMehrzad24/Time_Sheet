<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $invitation = Invitation::where('email', $request->email)->first('id');
        $invitation->id;
        if ($invitation->id) {
            // route company details
            return redirect('companies');
        } else {
            // create company route--
            return redirect()->route('companies.create');
        }

        return $next($request);
    }
}
