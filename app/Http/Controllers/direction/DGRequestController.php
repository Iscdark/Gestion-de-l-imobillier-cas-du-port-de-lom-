<?php

namespace App\Http\Controllers\direction;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;


class DGRequestController extends Controller
{
    public function index()
    {
        // Récupère toutes les demandes dont le service_status est 'approved' ou 'rejected'
        $requests = Requests::where('dg_status', 'en attente')->get();
        return view('requests.dg_validation', compact('requests'));
    }

    public function approve(Request $request, $id)
    {
        $validated = $request->validate([
            'motif' => 'required|string|max:255',
        ]);

        $houseRequest = Requests::findOrFail($id);
        $houseRequest->dg_status = 'approved';
        $houseRequest->motif = $validated['motif'];
        $houseRequest->save();

        Log::info('Request approved by DG with ID: ' . $id);

        return redirect()->route('dg.requests.index')->with('success', 'Request approved by DG successfully.');
    }

    public function reject(Request $request, $id)
    {
        $validated = $request->validate([
            'motif' => 'required|string|max:255',
        ]);

        $houseRequest = Requests::findOrFail($id);
        $houseRequest->dg_status = 'rejected';
        $houseRequest->motif = $validated['motif'];
        $houseRequest->save();

        Log::info('Request rejected by DG with ID: ' . $id);

        return redirect()->route('dg.requests.index')->with('success', 'Request rejected by DG successfully.');
    }
}
