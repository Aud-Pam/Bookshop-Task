<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
            //$user = Auth::user();
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if (!$user->isAdministrator()) {
                return redirect('/');
            }
            return $next($request);
        }

        return redirect()->intended('login');


        }

}
