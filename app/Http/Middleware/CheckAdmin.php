<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private $rotas = ["admin.login", "admin.logar", "admin.esqueci", "admin.resetar", "admin.reseta-senha", "admin.resetar-senha"];

    public function handle($request, Closure $next)
    {
        if($request->routeIs("admin.login") && Auth::guard('admin')->check())
            return redirect(route('admin.home'));
        if( $request->routeIs($this->rotas)){
            return $next($request);
        }
        if(Auth::guard('admin')->check())
            return $next($request);
        return redirect(route('admin.login'));
    }
}
