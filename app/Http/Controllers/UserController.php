<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(4); // Pagination avec 4 utilisateurs par page
        return view('users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
