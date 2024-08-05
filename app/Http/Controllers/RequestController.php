<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RequestController extends Controller
{


    public function index()
    {
        // Récupère toutes les demandes à valider pour le service
        $requests = Requests::where('service_status', 'en attente')->get();
        return view('requests.validation', compact('requests'));
    }
    
    public function indexDg()
    {
        $requests = Request::whereIn('dg_status', ['approved', 'rejected'])->get();
        return view('admin.dashboard', compact('requests'));
    }

    public function approve(Request $request, $id)
    {
        $validated = $request->validate([
            'motif' => 'required|string|max:255',
        ]);

        $houseRequest = Requests::findOrFail($id);
        $houseRequest->service_status = 'approved';
        $houseRequest->motif = $validated['motif'];
        $houseRequest->save();

        Log::info('Request approved with ID: ' . $id);

        return redirect()->route('requests.validation')->with('success', 'Request approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $validated = $request->validate([
            'motif' => 'required|string|max:255',
        ]);

        $houseRequest = Requests::findOrFail($id);
        $houseRequest->service_status = 'rejected';
        $houseRequest->motif = $validated['motif'];
        $houseRequest->save();

        Log::info('Request rejected with ID: ' . $id);

        return redirect()->route('requests.validation')->with('success', 'Request rejected successfully.');
    }
}
