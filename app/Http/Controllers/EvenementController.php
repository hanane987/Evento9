<?php

// app/Http/Controllers/EvenementController.php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements'));
    }

    public function create()
    {
        $categories::Category->all();
        dd( $categories);
        return view('evenements.create',compact('categories'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'number_places' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'users_id' => 'required|exists:users,id',
            'status' => 'required|in:manual,auto',
            'validated' => 'boolean',
        ]);

        // Handle image upload and storage (you may need to adjust this based on your setup)
        $imagePath = $request->file('image')->store('images', 'public');

        // Create a new Evenement instance
        Evenement::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'image' => $imagePath,
            'number_places' => $request->number_places,
            'category_id' => $request->category_id,
            'users_id' => $request->users_id,
            'status' => $request->status,
            'validated' => $request->validated,
        ]);

        return redirect()->route('evenements.index')->with('success', 'Evenement created successfully.');
    }

    public function show(Evenement $evenement)
    {
        return view('evenements.show', compact('evenement'));
    }

    public function edit(Evenement $evenement)
    {
        // You may need to pass additional data to the view, e.g., categories or users
        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        // Validation similar to the store method
        // ...

        // Update the Evenement instance
        $evenement->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'location' => $request->location,
            'number_places' => $request->number_places,
            'category_id' => $request->category_id,
            'users_id' => $request->users_id,
            'status' => $request->status,
            'validated' => $request->validated,
        ]);

        return redirect()->route('evenements.index')->with('success', 'Evenement updated successfully.');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Evenement deleted successfully.');
    }
    public function showReservationsStatistics(Evenement $evenement)
    {
        $reservations = Reservation::where('evenement_id', $evenement->id)->get();
        $totalReservations = $reservations->count();
    
        // You may fetch categories data here
        $categories = Category::all(); // Adjust this based on your actual data retrieval
    
        // Ajoutez d'autres statistiques au besoin
    
        return view('evenements.reservations_statistics', compact('evenement', 'totalReservations', 'categories'));
    }
    
}
