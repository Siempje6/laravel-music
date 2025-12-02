<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isMember()) {
            abort(403, 'Toegang geweigerd.');
        }
        return $next($request);
    }
}
