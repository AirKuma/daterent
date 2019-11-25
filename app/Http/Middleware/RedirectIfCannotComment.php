<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Rent;

class RedirectIfCannotComment
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
        $rent = Rent::find($request->id);
        $user = Auth::user();
        if($user->rentusers()->where('rent_id',$rent->id)->count()==0 || $user->comment()->where('rent_id',$rent->id)->count()!=0)
        {
                 return redirect()->back();
        }
        return $next($request);
    }
}
