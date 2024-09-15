<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   
     public function handle(Request $request, Closure $next, ...$roles): Response
     {
         if (!Auth::check()) {
             return redirect()->route('login');
         }
 
         $user = Auth::user();
 
         foreach ($roles as $role) {
             if (($role === 'admin' && $user->role === 0) ||
                 ($role === 'survey Team' && $user->role === 1) ||
                 ($role === '4ps' && $user->role === 2)) {
                 return $next($request);
             }
         }
 
         abort(403, 'Unauthorized action.');
     }

}
