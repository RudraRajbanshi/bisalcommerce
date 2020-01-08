<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->user_type != 'admin')
            {
               return redirect('/')->with('msg','Unauthorized');
            }
        }
        else
        {
            return redirect('/')->with('msg','Unauthorized');
        }
        return $next($request);
    }
}
