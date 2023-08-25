<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LogoutMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user('web')) {
            return $next($request);
        }

        // Jika tidak memenuhi kondisi, bisa diarahkan ke halaman tertentu atau melakukan tindakan lain
        abort(403, 'Unauthorized');
    }
}
