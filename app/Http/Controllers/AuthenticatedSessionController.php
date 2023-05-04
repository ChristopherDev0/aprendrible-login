<?php

namespace App\Http\Controllers;

/* use Dotenv\Exception\ValidationException; */
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    public function store(Request $request) 
    {
        $creadentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
         
        /* validamos en la base de datos */
        if( ! Auth::attempt($creadentials, $request->boolean('remember')) ){
            //fail
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        //success
        $request->session()->regenerate();

        return redirect()->intended()->with('status', 'You are logged in');
    }

    public function destroy(Request $request)
    {   
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'You are logged out!');
        
    }

}
