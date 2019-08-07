<?php

namespace App\Http\Middleware;

use Closure;

class Privileged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next, $role = ROLE_MEMBER )
    {
        // TODO : throw new AuthenticationException();
        return $next( $request );
    }
}