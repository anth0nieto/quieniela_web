<?php

namespace quiniela\Http\Middleware;
use Redirect;
use Closure;
use DB;
use Auth;
use Session;

class AdminMiddleware
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
        $count = DB::table('admins')->where('username',Auth::user()->username)->count();
        
        if($count == 1)
           return $next($request); 

        else
        {
           
            return Redirect::to('/showQuinielas');
        }
    }
}
