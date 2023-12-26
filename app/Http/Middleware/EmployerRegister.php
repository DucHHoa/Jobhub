<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployerRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user =  $request->user();
        if( $user){
            if($user->employer){
                return redirect()->route('my-jobs.index')
                ->with('error','You are employer!');
            }else{
                return redirect()->route('employer.create')
                ->with('error','You need register employer!');
            }
        }      
        return $next($request);       
    }
}
