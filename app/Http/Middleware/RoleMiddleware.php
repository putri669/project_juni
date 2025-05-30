<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
     public function handle(Request $request, Closure $next, $role): Response
    {
        $roleList = explode('|', $role);

        if (!in_array($request->user()->role, $roleList)) {
            return response()->json(['message' => "You don't have permission"], 403);
        }

        return $next($request);
    }
}
