<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_demande' => 'required|unique:FTC_status',
            'demance_Valider' => 'required|boolean',
            'demand_en_cours' => 'required|boolean',
            'demande_Terminer' => 'required|boolean',
        ]);

        Status::create($validated);
        return redirect()->route('statuses.index')->with('success', 'Statut créé avec succès.');
    }

    public function show(Status $status)
    {
        return view('statuses.show', compact('status'));
    }

    public function edit(Status $status)
    {
        return view('statuses.edit', compact('status'));
    }

    public function update(Request $request, Status $status)
    {
        $validated = $request->validate([
            'demance_Valider' => 'required|boolean',
            'demand_en_cours' => 'required|boolean',
            'demande_Terminer' => 'required|boolean',
        ]);

        $status->update($validated);
        return redirect()->route('statuses.index')->with('success', 'Statut mis à jour avec succès.');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index')->with('success', 'Statut supprimé avec succès.');
    }
}