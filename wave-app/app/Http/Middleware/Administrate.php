<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Administrate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //IF YOUR USERNAME IS NOT ADMIN, YOU CAN ONLY VIEW USERS PAGE
    public function handle(Request $request, Closure $next): Response
    {
        if(str_contains(session()->get('data'), "admin") == false){
            //ADMIN WAS NOT FOUND
            return redirect()->route('users.html')->with('admin_error', 'Only admins can edit users');
        }
        return $next($request); //SEND REQUEST DEEPLY
    }
}
