<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class ReturnIfRentIsExist
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
        $user = User::find($request->uid);
        if ($user->rent()->first()!=null)
        {
             return redirect()->back();
        }
        return $next($request);
    }
}
