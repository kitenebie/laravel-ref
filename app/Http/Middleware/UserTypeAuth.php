<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
// TODO: #6 import the Auth for authecication
use Illuminate\Support\Facades\Auth;

class UserTypeAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // TODO: #2 Make middleware by entering (CMD) - php artisan make:middleware NAME_OF_THE_MIDDLEWARE

        // TODO:#6 create a condition for checking the usertype
        if(Auth::user()->usertype == 'admin'){
            //if true
            return $next($request);
        }

        //TODO: #8 create a invalid request
        abort(401); //401: UNAUTHORIZED - the user can't able to view this page
    }
}
