<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class HasAnyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        $loggedInRole = Auth::user()->role->name;
        // $loggedInRole = 'client';
        if($loggedInRole != $role){
          return redirect('home');
        }

      return $next($request);
        /*
        if($this->user->hasRole($role)){
          return $next($request);
        };
        */


    }
}
