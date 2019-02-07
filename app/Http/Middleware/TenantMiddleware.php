<?php

namespace App\Http\Middleware;

use Closure;

class TenantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->is('api/*')){
            $user = \Auth::guard('api')->user();
            \Tenant::setTenant($user);
        }
        return $next($request);
//        //antes de chegar nos controller
//        $response = $next($request);
//        //algo depois dos controller
//        return $response;
    }
}

//onion style  middleware --> middleware --> middleware   () --> middleware --> middleware --> middleware