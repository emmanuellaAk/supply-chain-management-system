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

    // Check if the user is null
    if (!$user) {
        // Log the information that the user is null
        Log::warning('No authenticated user found');

        // You can either throw an exception, redirect to login, or return an error response
        // return redirect()->route('admin.login');

        return response()->json(['error' => 'Unauthorized'], 401);
    }

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
    if (!in_array($action, $permissions)) {
        // Log the unauthorized access attempt
        Log::warning('User does not have permission for this action', ['action' => $action]);

        // Return a 403 Forbidden response or handle it as you prefer
        return response()->json(['error' => 'Forbidden'], 403);
    }

    return $next($request);
}





}

