<?php
 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CheckSesison
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
        if (! Session::has('phoneNumber')) {
            //return redirect('/');
            //print_r($next);
            return redirect('/');
        }
        return $next($request);
        
        
    }
}
