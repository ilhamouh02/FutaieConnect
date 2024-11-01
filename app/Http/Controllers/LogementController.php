<?php

namespace App\Http\Controllers;

use App\Models\Logement;
use Illuminate\Http\Request;

class LogementController extends Controller
{
    public function index()
    {
        $logements = Logement::all();
        return view('logements.index', compact('logements'));
    }

    public function create()
    {
        return view('logements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_Logement' => 'required|unique:FTC_logements',
            'nb_Lit' => 'required|integer',
        ]);

        Logement::create($validated);
        return redirect()->route('logements.index')->with('success', 'Logement créé avec succès.');
    }

    public function show(Logement $logement)
    {
        return view('logements.show', compact('logement'));
    }

    public function edit(Logement $logement)
    {
        return view('logements.edit', compact('logement'));
    }

    public function update(Request $request, Logement $logement)
    {
        $validated = $request->validate([
            'nb_Lit' => 'required|integer',
        ]);

        $logement->update($validated);
        return redirect()->route('logements.index')->with('success', 'Logement mis à jour avec succès.');
    }

    public function destroy(Logement $logement)
    {
        $logement->delete();
        return redirect()->route('logements.index')->with('success', 'Logement supprimé avec succès.');
    }
}