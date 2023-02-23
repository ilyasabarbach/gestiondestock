<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

     /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function authentificated(){
        if(Auth::user()->type == '1'){

            return redirect('/Admin.index')->with('status','Bienvenu Admin');
        }
        elseif(Auth::user()->type == '2'){
            return redirect('/livreur.index')->with('status','Bienvenu chère livreur');
        }
        elseif(Auth::user()->type == '3'){
            return redirect('/Fornisseur.index')->with('status','Bienvenu chère fournisseur');
        }
        elseif(Auth::user()->type == '0'){

            return redirect('/client.index')->with('status','bienvenu chère client');

        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
