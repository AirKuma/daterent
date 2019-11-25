<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class ReturnIfNotUser
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
        if(Auth::user()->id!=$request->id &&Auth::user()->permissions!=1){
             return redirect()->back();
        }
        return $next($request);
    }
}
