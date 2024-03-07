<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Evenement1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('evenements.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
       
        return view('evenements.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'status' => 'required|in:manual,auto',
            
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
            'users_id' =>Auth::id(),
            'status' => $request->status,
           
        ]);

        return redirect()->route('evenements.index')->with('success', 'Evenement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        $categories=Category::all();
        return view('evenements.show', compact('evenement','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        $categories=Category::all();
        return view('evenements.edit', compact('evenement','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
{
    $evenement->update([
        'title' => $request->title,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'location' => $request->location,
        'number_places' => $request->number_places,
        'category_id' => $request->category_id,
        'users_id' => auth()->id(), // Set the users_id to the authenticated user's ID
        'status' => $request->status,
    ]);

    return redirect()->route('evenements.index')->with('success', 'Evenement updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Evenement deleted successfully.');
    }
    public function showReservationsStatistics()
    {
        // Récupérer les événements pour l'utilisateur actuel
        $evenements = Evenement::where('users_id', auth()->id())->get();
        
        // Initialiser le tableau pour les statistiques
        $statistics = [];
    
        foreach ($evenements as $evenement) {
            $totalReservations = $evenement->reservations->count();
    
            $autreStatistique = // Logique pour calculer d'autres statistiques;
    
            $statistics[] = [
                'evenement' => $evenement,
                'totalReservations' => $totalReservations,
                'autreStatistique' => $autreStatistique,
            ];
        }
    
        $categories = Category::all();
    
        // Passez les données à la vue
        return view('evenements.reservations_statistics', compact('statistics', 'categories'));
    }
    public function display()
{
    $evenements = Evenement::all();
    return view('evenements.display', compact('evenements'));
}
}