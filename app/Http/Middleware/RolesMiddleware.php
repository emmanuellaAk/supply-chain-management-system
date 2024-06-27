<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the authenticated user
        $user = Auth::user();

        // Log the user information
        Log::info($user);

        // Initialize the permissions array
        $permissions = [];

        // Collect permissions from roles
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission->name;
            }
        }

        // Collect direct permissions of the user
        foreach ($user->permissions as $permission) {
            $permissions[] = $permission->name;
        }

        // Get the action name from the route
        $action = class_basename($request->route()->getName());

        // Check if the action is in the user's permissions
        if (in_array($action, $permissions)) {
            // Authorized request
            return $next($request);
        }

        // Unauthorized request
        return response('Unauthorized Action', 403);
    }
}

