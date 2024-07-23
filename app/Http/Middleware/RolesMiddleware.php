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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is null
        if (!$user) {
            // Log the information that the user is null
            Log::warning('No authenticated user found');

            // Check if the current route is not the login route to prevent redirect loop
            if ($request->route()->getName() !== 'login') {
                return redirect()->route('login')->with('error', 'unauthorized access');
            }

            // If it is the login route, just proceed to the next middleware/request handler
            return $next($request);
        }

        // Log the user information
        Log::info('Authenticated user:', ['user' => $user]);

        // Initialize the permissions array
        $permissions = [];

        // Collect permissions from roles
        foreach ($user->roles as $role) {
            Log::info('Role:', ['role' => $role]);
            foreach ($role->permissions as $permission) {
                Log::info('Role permission:', ['permission' => $permission]);
                $permissions[] = $permission->name;
            }
        }

        // Collect direct permissions of the user
        foreach ($user->permissions as $permission) {
            Log::info('User permission:', ['permission' => $permission]);
            $permissions[] = $permission->name;
        }

        // Log all collected permissions
        Log::info('Collected permissions:', ['permissions' => $permissions]);

        // Get the action name from the route
        $action = class_basename($request->route()->getName());

        // Log the action being checked
        Log::info('Action being checked:', ['action' => $action]);

        // Check if the action is in the user's permissions
        if (!in_array($action, $permissions)) {
            // Log the unauthorized access attempt
            Log::warning('User does not have permission for this action', ['action' => $action]);

            // Return a 403 Forbidden response or handle it as you prefer
            return redirect()->route('login')->with('error', 'unauthorized access');
        }

        return $next($request);
    }
}
