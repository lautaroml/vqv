<?php

namespace App\Http\Middleware;

use Closure;

class UpTime
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
        $hoy = getdate();
        if ($hoy['mon'] == 9 && $hoy['mday'] == 30 && $hoy['hours'] >= 19) {
            return $next($request);
        }
        return view('welcome');
    }
}
