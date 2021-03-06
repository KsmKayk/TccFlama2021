<?php

namespace App\Http\Middleware;

use App\Models\Administrator;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user_id = auth()->user()->id;
        $adm = Administrator::where('user_id', $user_id)->first();
        if ($adm) {
            return $next($request);
        }

        abort(401);
    }
}
