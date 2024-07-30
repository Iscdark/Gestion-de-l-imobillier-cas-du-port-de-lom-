<?php

namespace App\Http\Controllers\service;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    public function index()
    {
        return view('service.login');
    }

    public function authenticate(Request $request)
    {
        // Valider les données d'entrée
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('service.login')
                ->withInput()
                ->withErrors($validator);
        }
 
        // Authentifier l'service
        if (Auth::guard('service')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::guard('service')->user()->role != 'service') {
                Auth::guard('service')->logout();
                return redirect()->route('service.login')->with('error', 'Non Authorized user');
            }
            return redirect()->route('service.dashboard')->with('success', 'Login successful');
        } else {
            return redirect()->route('service.login')->with('error', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::guard('service')->logout();
        return redirect()->route('service.login');
    }
}
