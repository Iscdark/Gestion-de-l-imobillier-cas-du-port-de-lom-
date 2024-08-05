<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticate(Request $request)
    {
        // Valider les données d'entrée
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    
        // Authentifier l'utilisateur avec la condition is_active
        if (Auth::attempt($this->credentials($request))) {
            $user = Auth::user(); // Récupérer l'utilisateur authentifié
            // Vérifier si l'utilisateur est authentifié et a un rôle
            if ($user) {
                $userRole = $user->role;
    
                if (in_array($userRole, ['admin', 'Dg', 'service'])) {
                    Auth::logout();
                    return redirect()->route('account.login')->with('error', 'Utilisateur non autorisé.');
                }
    
                return redirect()->route('account.dashboard')->with('success', 'Connexion réussie.');
            }
        }
    
        return redirect()->route('account.login')->with('error', 'Email ou mot de passe incorrect.');
    }
    
    public function processRegister(Request $request)
    {
        // Valider les données d'entrée
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('account.register')
                ->withInput()
                ->withErrors($validator);
        }
    
        // Créer un nouvel utilisateur
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'user'; // Définir le rôle par défaut comme 'user'
        $user->is_active = true;
        $user->save();
    
        // Vérifier si l'utilisateur est authentifié avant d'accéder à ses propriétés
        if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin') {
            return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
        } else {
            return redirect()->route('account.login')->with('success', 'Inscription réussie.');
        }
    }
    

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
    
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'is_active' => true, // Ajouter cette condition pour vérifier que le compte est actif
        ];
    }
}
