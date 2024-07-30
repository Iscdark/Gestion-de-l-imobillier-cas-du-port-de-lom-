<?php

namespace App\Http\Controllers\direction;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function index()
    {
        return view('directions.login');
    }

    public function authenticate(Request $request)
    {
        // Valider les données d'entrée
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('direction.login')
                ->withInput()
                ->withErrors($validator);
        }
 
        // Authentifier l'admin
        if (Auth::guard('Dg')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('Dg')->user()->role != 'Dg') {
                Auth::guard('Dg')->logout();
                return redirect()->route('direction.login')->with('error', 'Non Authorized user');
            }
            return redirect()->route('direction.dashboard')->with('success', 'Login successful');
        } else {
            return redirect()->route('direction.login')->with('error', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::guard('Dg')->logout();
        return redirect()->route('direction.login');
    }
}
