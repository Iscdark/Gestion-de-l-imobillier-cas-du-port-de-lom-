<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Requests; // Assurez-vous que le modèle HouseRequest est bien importé
use Illuminate\Http\Request as HttpRequest; // Importez la classe Request pour la requête HTTP

class RequestController extends Controller
{
    public function index()
    {
        // Utilisation du modèle HouseRequest pour obtenir les demandes avec les relations user et house
        $requests = Requests::whereIn('dg_status', ['approved', 'rejected'])->get();
        return view('Requests.index', compact('requests'));
    }

    public function updateStatus(HttpRequest $request, $id)
    {
        // Utilisation du modèle HouseRequest pour trouver la demande par ID
        $houseRequest = Requests::findOrFail($id);
        $houseRequest->status = $request->input('status'); // Utilisation de $request pour obtenir le statut de la requête HTTP
        $houseRequest->save();

        return redirect()->route('requests.index')->with('success', 'Request status updated successfully.');
    }
}
