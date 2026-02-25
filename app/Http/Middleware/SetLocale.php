<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale('fa');
        setlocale(LC_TIME, 'fa_IR.UTF-8');

        return $next($request);
    }
}
