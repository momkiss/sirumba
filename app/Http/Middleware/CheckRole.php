<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Redirect;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if($request->user() === null){
          //return response("Insufficient permissions", 401);
          return redirect('/login')->with('pesan', 'Tidak ada izin untuk mengakses halaman ini');
        }
        $actions = $request->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;

        if($request->user()->hasAnyRoles($roles) || !$roles){
          return $next($request);
        }

        // return response("Insufficient permissions", 401);
        return redirect('/login')->with('pesan', 'Tidak ada izin untuk mengakses halaman ini');
    }
}
