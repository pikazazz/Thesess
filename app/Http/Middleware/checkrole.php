<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {

        if(Auth::user()){
            if ($role == Auth::user()->role) {
                return $next($request);
            }else{
                return redirect()->route('Error.show',401);

            }


        }else{
            return redirect()->route('Error.show',401);
        }



    }


}
