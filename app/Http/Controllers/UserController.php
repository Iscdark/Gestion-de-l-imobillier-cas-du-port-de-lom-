<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5); // Pagination avec 4 utilisateurs par page
        return view('users.index', compact('users'));
    }

    public function showActiveUsers()
    {
        $users = User::where('is_active', true)->paginate(10);
        return view('users.active-users', compact('users'));
    }

    public function showInactiveUsers()
    {
        $users = User::where('is_active', false)->paginate(10);
        return view('users.inactive-users', compact('users'));
    }

    

    public function activate($id)
{
    $user = User::findOrFail($id);
    
    // Validation: vérifier si l'utilisateur est déjà activé
    if ($user->is_active) {
        return redirect()->route('users.index');
    }

    // Activer l'utilisateur
    $user->is_active = true;
    $user->save();

    return redirect()->route('users.index');
}

public function deactivate($id)
{
    $user = User::findOrFail($id);
    
    // Validation: vérifier si l'utilisateur est déjà désactivé
    if (!$user->is_active) {
        return redirect()->route('users.index');
    }

    // Désactiver l'utilisateur
    $user->is_active = false;
    $user->save();

    return redirect()->route('users.index');
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    
    // Suppression de l'utilisateur
    $user->delete();

    return redirect()->route('users.index');
}

}
