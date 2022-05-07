<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $inside = 0;
        $outside = 0;
        foreach ($guards as $guard)
        {
            if ($guard == "inside")
                $inside = 1;
            else if ($guard == "outside")
                $outside = 1;
        }
        if (Auth::check())
        {


            $userid = Auth::id();
            if (User::find($userid)->active)
            {
                if ($outside)
                    return redirect("dashboard");
            }
            else
            {
                if ($inside)
                    return redirect("notactive");
            }
        }
        else
        {
            return redirect("signin");
        }

        return $next($request);
    }
}
