<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roles_name = [ "admin" , "owner"];
        $user= implode(Auth::user()->roles_name) ;

        if(in_array( $user , $roles_name ) ){



            return redirect()->route('home');
    }
    return $next($request);
    }
    }

//     $roles_name = ['user'];

//     if(in_array(Auth::user()->roles_name , $roles_name) ){


//         return redirect()->route('fronts.home');
// }
//     return $next($request);
// }
