<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReparationController extends Controller
{
    public function index()
    {
        $reparations = Reparation::latest()->get();
        return view('reparations.index', compact('reparations'));
    }

    public function create()
    {
        return view('reparations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|string',
            'date_entree' => 'required|date',
            'date_sortie' => 'nullable|date',
            'type_reparation' => 'required|string',
            'emplatre_rad' => 'nullable|string',
            'gomme_mtr' => 'nullable|numeric',
            'verre_dissolut' => 'nullable|numeric',
            'duree_reparation' => 'nullable|string',
        ]);

        Reparation::create($request->all());

        return redirect()
            ->route('reparations.index')
            ->with('success', 'Réparation enregistrée avec succès.');
    }

    public function destroy(Reparation $reparation)
    {
        $reparation->delete();

        return redirect()
            ->route('reparations.index')
            ->with('success', 'Réparation supprimée avec succès.');
    }

        public function print($id)
{
    $reparation = Reparation::findOrFail($id);

    $company = [
        'nom' => 'SERVIRIM',
        'capital' => '1.000.000 MRO',
        'nif' => '10724265',
        'rc' => '77471',
        'cnss_employeur' => '11092',
        'adresse' => 'Rue Sidi Mohamed Ould Cheikh Abdallahi, K, Ext S3 n° 0069D, Nouakchott',
        'telephone' => '+222 45 24 53 84',
        'email' => 'contact@servirim.com',
        'site' => 'www.servirim.com',
        'compte_bancaire' => '0209120005GBM',
    ];

    $pdf = Pdf::loadView('reparations.pdf', compact('reparation', 'company'));

    return $pdf->stream('reparation-'.$reparation->id.'.pdf');
}


}
