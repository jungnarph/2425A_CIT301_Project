<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class InspectRequest
{
    public function handle($request, Closure $next)
    {
        $ip = $request->ip();
        $agent = $request->userAgent();
        $content = $request->getContent();

        // 🚨 RATE LIMITING (100 req/min)
        $key = 'rate_limit:' . $ip;
        $limit = 100; // max 100 requests
        $ttl = 60;    // in seconds

        $requests = Cache::get($key, 0) + 1;
        Cache::put($key, $requests, $ttl);

        if ($requests > $limit) {
            Log::warning("[IDPS] Rate limit exceeded from $ip ($requests requests in {$ttl}s)");
            abort(429, 'Too many requests.');
        }

        // 🚫 Block known bad user agents
        $badAgents = ['sqlmap', 'curl', 'nmap'];
        foreach ($badAgents as $bad) {
            if (stripos($agent, $bad) !== false) {
                Log::warning("[IDPS] Suspicious agent detected: $agent from $ip");
                abort(403, 'Suspicious activity detected.');
            }
        }

        // 🚫 Block known blacklisted IPs
        $blacklistIps = ['192.168.1.5', '10.0.0.1'];
        if (in_array($ip, $blacklistIps)) {
            Log::warning("[IDPS] Blacklisted IP: $ip");
            abort(403, 'Access denied.');
        }

        // 🚫 Basic SQL Injection pattern detection
        if (preg_match('/(union|select|drop|sleep|benchmark)/i', $content)) {
            Log::alert("[IDPS] SQLi pattern detected from $ip");
            abort(403, 'Suspicious input.');
        }

        return $next($request);
    }
}
