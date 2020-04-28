<?php

namespace App\Http\Middleware;

use App\Models\UniqueUsers;
use Closure;

class BrowserCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $browser = \Browser::browserFamily();

        UniqueUsers::where('ip_address', $ip)->firstOrCreate(['browser' => $browser, 'ip_address' => $ip]);

        return $next($request);
    }


}
