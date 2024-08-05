<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->paginate(10);
        return view('admin.administrators.index', compact('admins'));
    }

    // Afficher le formulaire de création d'un administrateur
    public function create()
    {
        return view('admin.administrators.create');
    }

    // Enregistrer un nouvel administrateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.administrators.index')->with('success', 'Administrateur créé avec succès.');
    }

    // Afficher le formulaire d'édition d'un administrateur
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.administrators.edit', compact('admin'));
    }

    // Mettre à jour un administrateur
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $admin->password,
        ]);

        return redirect()->route('admin.administrators.index')->with('success', 'Administrateur mis à jour avec succès.');
    }

    // Supprimer un administrateur
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.administrators.index')->with('success', 'Administrateur supprimé avec succès.');
    }
}
