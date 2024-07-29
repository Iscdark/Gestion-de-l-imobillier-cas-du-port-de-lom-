<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    public function create()
    {
        return view('houses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'nullable|string',
            'status' => 'required|in:available,occupied,maintenance',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        $house = new House();
        $house->description = $request->input('description');
        $house->status = $request->input('status');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/houses', 'public');
            $house->image = $imagePath;
        }

        $house->save();

        return redirect()->route('houses.index')->with('success', 'House created successfully.');
    }

    public function edit(House $house)
    {
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, House $house)
    {
        $request->validate([
            'description' => 'nullable|string',
            'status' => 'required|in:available,occupied,maintenance',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp,svg|max:2048',
        ]);

        $house->description = $request->input('description');
        $house->status = $request->input('status');

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($house->image) {
                Storage::disk('public')->delete($house->image);
            }

            $imagePath = $request->file('image')->store('images/houses', 'public');
            $house->image = $imagePath;
        }

        $house->save();

        return redirect()->route('houses.index')->with('success', 'House updated successfully.');
    }

    public function destroy(House $house)
    {
        try {
            // Supprimer l'image associée
            if ($house->image && Storage::disk('public')->exists($house->image)) {
                Storage::disk('public')->delete($house->image);
            }
    
            // Supprimer la maison
            $house->delete();
    
            return redirect()->route('houses.index')->with('success', 'House deleted successfully.');
        } catch (\Exception $e) {
            // En cas d'erreur, afficher un message d'erreur
            return redirect()->route('houses.index')->with('error', 'Failed to delete the house. Please try again.');
        }
    }
    
}
