<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvisorMiddleware
{
    
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            $userCheck = \App\Models\UserRole::where('user_id',Auth::id() )->first();
            if($userCheck->role_id == 2){ //Advisor Role = 2
                return $next($request); 
            }else{
                return redirect()->back();
            }

        }else{
            return redirect()->route('signin');
        }
    }
}
