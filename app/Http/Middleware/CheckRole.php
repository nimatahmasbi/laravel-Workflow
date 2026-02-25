<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $user = $request->user();
        
        switch ($role) {
            case 'admin':
                if (!$user->isAdmin()) {
                    abort(403, 'دسترسی غیرمجاز');
                }
                break;
                
            case 'manager':
                if (!$user->isManager()) {
                    abort(403, 'دسترسی غیرمجاز');
                }
                break;
                
            case 'supervisor':
                if (!$user->isSupervisor()) {
                    abort(403, 'دسترسی غیرمجاز');
                }
                break;
                
            default:
                abort(400, 'نقش نامعتبر');
        }

        return $next($request);
    }
}
