<?php

namespace App\Http\Controllers;

use App\Models\Prise;
use Illuminate\Http\Request;

class PriseController extends Controller
{
    public function index()
    {
        $prises = Prise::with('logement')->get();
        return view('prises.index', compact('prises'));
    }

    public function create()
    {
        return view('prises.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_Prise' => 'required|unique:FTC_prises',
            'id_Logement' => 'required|exists:FTC_logements,id_Logement',
        ]);

        Prise::create($validated);
        return redirect()->route('prises.index')->with('success', 'Prise créée avec succès.');
    }

    public function show(Prise $prise)
    {
        return view('prises.show', compact('prise'));
    }

    public function edit(Prise $prise)
    {
        return view('prises.edit', compact('prise'));
    }

    public function update(Request $request, Prise $prise)
    {
        $validated = $request->validate([
            'id_Logement' => 'required|exists:FTC_logements,id_Logement',
        ]);

        $prise->update($validated);
        return redirect()->route('prises.index')->with('success', 'Prise mise à jour avec succès.');
    }

    public function destroy(Prise $prise)
    {
        $prise->delete();
        return redirect()->route('prises.index')->with('success', 'Prise supprimée avec succès.');
    }
}