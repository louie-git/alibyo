<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class VisitorAuth
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
        if(Auth::user() && \Auth::user()->acc_position =='User')
        {
            return $next($request);
            
        }
        if(Auth::user() && \Auth::user()->acc_position =='Super_Admin' or 'Admin')
        {
            if(auth()->user()){
                return abort(403);
            }else{
                return redirect('/signin');
            }
        }
        else
        {
            return redirect('/signin');
        }
        
    }
    
}
