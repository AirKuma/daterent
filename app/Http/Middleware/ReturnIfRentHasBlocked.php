<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class ReturnIfRentHasBlocked
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
        $user = User::find($request->id);
        if($user->rent()->first()!=null){
            if ($user->rent()->first()->ifrent == 2 && (Auth::check() ? Auth::user()->permissions!=1 : true))
            {
                 return redirect()->back();
            }
        }
        return $next($request);
    }
}
