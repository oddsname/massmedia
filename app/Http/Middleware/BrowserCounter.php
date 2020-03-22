<?php

namespace App\Http\Middleware;

use App\Models\UniqueUsers;
use Closure;

class BrowserCounter
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
        if(env('APP_DEBUG')){
            $ip = rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255).'.'.rand(1, 255);
            $browsers = ['Internet Explorer', 'Mozilla Firefox', 'Google Chrome', 'Apple Safari', 'Opera', 'Netscape'];
            $browser = $browsers[rand(0, 5)];
        }else{
            $ip = $request->ip();
            $browser = $this->getBrowser();
        }

        UniqueUsers::where('ip_address', $ip)->firstOr(function () use ($ip, $browser){
           UniqueUsers::create(['browser' => $browser, 'ip_address' => $ip]);
        });

        return $next($request);
    }

    function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = '';
        
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Internet Explorer';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $browser = 'Mozilla Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $browser = 'Google Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $browser = 'Apple Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $browser = 'Netscape';
        }

        return $browser;
    }

}
