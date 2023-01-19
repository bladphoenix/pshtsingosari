<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserStatus
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
        if ($request->is('api*') && $request->wantsJson()) {
            if (!Auth::user()->status) {
                Auth::user()->tokens()->delete();
                return response()->json(['success' => false, 'message' => 'Your Account Suspended!'], 401);
            }
            return $next($request);
        }
        if (Auth::guard('admin')->check()) {
            if (!Auth::user()->status) {
                Session::flush();
                Auth::guard('admin')->logout();
                return redirect()->route("admin.login")->with('error', 'Your Account Suspended!');
            }
            return $next($request);
        }
        if (!Auth::user()->status) {
            Session::flush();
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your Account Suspended!');
        }
        return $next($request);
    }
}
