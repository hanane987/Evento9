<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function switchRole(User $user)
    {
        $user->is_organisateur = !$user->is_organisateur;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User role switched successfully.');
    }

    public function softDelete(User $user)
    {
        if ($user->trashed()) {
            // If the user is soft deleted, restore the user
            $user->restore();
            $message = 'User restored successfully.';
        } else {
            // If the user is not soft deleted, soft delete the user
            $user->delete();
            $message = 'User soft deleted successfully.';
        }
    
        return redirect()->route('users.index')->with('success', $message);
    }
}
