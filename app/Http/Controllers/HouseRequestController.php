<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HouseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HouseRequestController extends Controller
{
    public function create($houseId)
    {
        $house = House::findOrFail($houseId);
        return view('house_request', compact('house'));
    }
    public function userRequests()
    {
        $requests = HouseRequest::where('user_id', auth()->id())->paginate(10); // Pagination des demandes
        return view('users.requests', compact('requests')); // Vue des demandes de l'utilisateur
    }
    // Enregistrer une nouvelle demande
    public function store(Request $request)
    {
        // Valider les données d'entrée
        $request->validate([
            'house_id' => 'required|exists:houses,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'marital_status' => 'required|string|max:50',
        ]);

        // Créer une nouvelle demande
        $houseRequest = new HouseRequest();
        $houseRequest->user_id = Auth::id();
        $houseRequest->house_id = $request->house_id;
        $houseRequest->name = $request->name;
        $houseRequest->phone = $request->phone;
        $houseRequest->address = $request->address;
        $houseRequest->profession = $request->profession;
        $houseRequest->marital_status = $request->marital_status;
        $houseRequest->save();

        return redirect()->route('account.dashboard')->with('success', 'Request submitted successfully.');
    }
}
