<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user() || $request->user()->usertype !== 'admin') {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึงส่วนนี้ (สำหรับ Admin เท่านั้น)');
        }

        return $next($request);
    }
}
