<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class ReturnIfUserHasBlocked
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
        if ($user->permissions == 2 && (Auth::check() ? Auth::user()->permissions!=1 : true))
        {
             return redirect()->back()->with('message', '此帳號已遭封鎖');
        }
        return $next($request);
    }
}
