<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        /*
        if(auth()->user()->getRole()==$role)
        return $next($request);
        else
            return redirect('/');
            */
            $user = User::find(auth()->user()->id);
        if ($user->roles()->where('name',$role)->count())
            return $next($request);
        else
            return redirect('/');
    }
}
