<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Requests; // Assurez-vous que le modèle est importé correctement
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseRequestController extends Controller
{
    // Afficher le formulaire de demande pour une maison spécifique
    public function create($houseId)
    {
        $house = House::findOrFail($houseId);
        return view('house_request', compact('house'));
    }

    // Afficher les demandes de l'utilisateur connecté avec pagination
    public function userRequests()
    {
        $requests = Requests::where('user_id', auth()->id())->paginate(10);
        return view('users.requests', compact('requests'));
    }

    // Enregistrer une nouvelle demande
    public function store(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'house_id' => 'required|exists:houses,id',
            'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'birth_year' => 'required|integer|digits:4', // Assure que c'est une année à 4 chiffres
            'address' => 'required|string|max:255',
            'profession_at_port' => 'required|string|max:255',
            'letter' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validation pour le fichier
        ]);

        // Créer une nouvelle demande
        $houseRequest = new Requests();
        $houseRequest->user_id = Auth::id();
        $houseRequest->house_id = $request->house_id;
        $houseRequest->name = $request->name;
        $houseRequest->first_name = $request->first_name;
        $houseRequest->birth_year = $request->birth_year;
        $houseRequest->address = $request->address;
        $houseRequest->profession_at_port = $request->profession_at_port;

        // Gestion du fichier de lettre
        if ($request->hasFile('letter')) {
            $file = $request->file('letter');
            $path = $file->store('letters', 'public');
            $houseRequest->letter = $path;
        }

        // Initialiser les champs de statut
        $houseRequest->service_status = 'en attente'; // Statut du service
        $houseRequest->dg_status = 'en attente'; // Statut DG
        $houseRequest->initial_status = 'en attente'; // Statut initial
        $houseRequest->motif = null; // Motif, si nécessaire, peut être mis à jour plus tard

        // Sauvegarder la demande
        $houseRequest->save();

        return redirect()->route('account.dashboard')->with('success', 'Request submitted successfully.');
    }
}
