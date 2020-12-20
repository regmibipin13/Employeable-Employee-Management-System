<?php

namespace App\Http\Middleware;

use Closure;

class IfEmployeeDisabled
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
        if(!auth()->user()->is_enabled) {
            return redirect()->to('/admin')->with('error','You account has been disabled by the admin . Please contact admin to unlock your account');
        }
        return $next($request);
    }
}
