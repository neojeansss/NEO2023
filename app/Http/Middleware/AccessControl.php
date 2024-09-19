<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class AccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $accessCode): Response
    {
        // dd($accessCode);
        $accessData = DB::table('access_controls')
        ->join('accesses', 'access_controls.access_id', '=', 'accesses.id')
        ->where('user_id', auth()->user()->id)
        ->where('accesses.code', $accessCode)
        ->first();

        // dd($accessData);

        if ($accessData) {
            return $next($request);
        } else {
            return back()->with('error', 'Not authorized!');
        }
    }
}
