<?php

namespace App\Http\Middleware;

use Closure;

class CekLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        if(!session('berhasil-login')){
            return redirect('/');
        }
            if(in_array($request->user()->role,$roles)){
                return $next($request);
            }
                return redirect('404');
    }

    
}
