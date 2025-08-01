<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsCustomerLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('customer')) {
            return redirect()->route('customer.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return $next($request);
    }
}
