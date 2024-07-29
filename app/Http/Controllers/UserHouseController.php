<?php

namespace App\Http\Controllers;
use App\Models\House;
use Illuminate\Http\Request;

class UserHouseController extends Controller
{
     // Affiche la liste des maisons pour les utilisateurs
     public function index()
     {
         $houses = House::paginate(4); // Pagination des maisons
         return view('dashboard', compact('houses')); // Vue du tableau de bord utilisateur
     }
}
