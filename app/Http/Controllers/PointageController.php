<?php

namespace App\Http\Controllers;

use App\Models\Pointage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PointageController extends Controller
{
    public function index()
    {
        $pointages = Pointage::latest()->get();
        return view('pointage.index', compact('pointages'));
    }

    public function create()
    {
        return view('pointage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'technicien' => 'required|string|max:255',
            'tache' => 'nullable|string|max:255',
            'date_pointage' => 'required|date',
            'heure_pointage' => 'nullable',
            'present' => 'nullable|boolean',
            'nb_pneus_repares' => 'nullable|integer|min:0',
            'observation' => 'nullable|string',
            'besoins' => 'nullable|string',
        ]);

        Pointage::create($request->all());

        return redirect()->route('pointage.index')
                         ->with('success', 'Pointage enregistré avec succès ✅');
    }

    public function edit($id)
    {
        $pointage = Pointage::findOrFail($id);
        return view('pointage.edit', compact('pointage'));
    }

    public function update(Request $request, $id)
    {
        $pointage = Pointage::findOrFail($id);
        $pointage->update($request->all());

        return redirect()->route('pointage.index')
                         ->with('success', 'Pointage mis à jour ✔');
    }

    public function destroy($id)
    {
        Pointage::destroy($id);

        return redirect()->route('pointage.index')
                         ->with('success', 'Pointage supprimé ✔');
    }

           public function print($id)
{
    $pointage = Pointage::findOrFail($id);

    $pdf = Pdf::loadView('pointage.pdf', compact('pointage'))
              ->setPaper('A4', 'portrait');

    return $pdf->download('pointage_'.$pointage->technicien.'_'.$pointage->date_pointage.'.pdf');
}


}

