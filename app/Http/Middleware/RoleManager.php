<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check ()){
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $authUserType = Auth::user()->usertype;

        switch($role) {
            case 'admin':
                if($authUserType == 'admin' || $authUserType =='superadmin') {
                    return $next($request);
                }
                break;
            case 'user':
                if($authUserType == 'user') {
                    return $next($request);
                }
                break;
        }

        switch($authUserType) {
            case 'admin':
                return redirect()->route('admin');
            case 'superadmin':
                return redirect()->route('admin');
            case 'user':
                return redirect()->route('landing');
        }

        return redirect()->route('auth.login');

    }
}
