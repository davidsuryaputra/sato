<?php

namespace App\Http\Middleware;

use Closure;

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
        // dd($role);
        // $loggedInRole = 'client';
        $loggedInRole = 'owner';
        if($loggedInRole != $role){
          return redirect('/denied/'.$role);
        }

      return $next($request);
        /*
        if($this->user->hasRole($role)){
          return $next($request);
        };
        */


    }
}
