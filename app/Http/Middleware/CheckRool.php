<?php

namespace App\Http\Middleware;

use Closure;

class CheckRool
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
        if ($request->user()->id_rol != 1) {
            return redirect()->back()->with('warning', 'No Cuentas con los permisos nesesarios.');
        }
        return $next($request);
    }
}
