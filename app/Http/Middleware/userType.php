<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class userType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            if(Auth::user()->type =='1'){
                //return redirect('/Admin.index')->with('status','bienvenue Admin');
                return $next($request);
            }
            elseif(Auth::user()->type=='2'){
                return redirect('/fournisseur')->with('status','bienvenue Client');
            }
            elseif(Auth::user()->type=='3'){
                return redirect('/livreur')->with('status','bienvenue livreur');
            }
            else{
                return redirect('/client')->with('status','Bienvenu chère client');
            }
        }
        else{
            return redirect('/')->with('status','veuillez vous inscrire!');
        }
    }
}
