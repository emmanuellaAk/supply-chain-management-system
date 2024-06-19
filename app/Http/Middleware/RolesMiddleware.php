<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesMiddleware
{
    protected $auth;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // get user role permissions
        $permissions = [];

        \Log::info($this->auth->user());
        foreach ($this->auth->user()->roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissions[] = $permission->name;
            }
        }
        // dd($this->auth->user()->permissions);
        foreach ($this->auth->user()->permissions as $permission) {
            $permissions[] = $permission->name;
        }

        $action = class_basename($request->route()->getName()); // separating controller and method

        foreach ($permissions as $permission) {
            if ($action == $permission) {
                // authorized requests
                return $next($request);
            }
        } 
       // none authorized request
       return response('Unauthorized Action', 403);
     }
}

