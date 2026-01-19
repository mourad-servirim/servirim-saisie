<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employe;

class BulletinController extends Controller
{
    public function create()
    {
        return view('bulletins.create');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'nni' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date'
        ]);

        $employe = Employe::where('nni', $request->nni)->first();

        if (!$employe) {
            return back()->with('error', '❌ Employé introuvable avec ce NNI.');
        }

        // Calcul des cotisations et impôts
        $salaire_base = $employe->salaire_base;
        $cnss = $salaire_base * 0.01;  // 1%
        $cnam = $salaire_base * 0.04;  // 4%
        $its  = $salaire_base * 0.15;  // 15%
        $net_a_payer = $salaire_base - ($cnss + $cnam + $its);

        // Informations entreprise
        $entreprise = config('entreprise');

        $data = [
            'entreprise' => $entreprise,
            'employe' => $employe,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'cnss' => $cnss,
            'cnam' => $cnam,
            'its' => $its,
            'net_a_payer' => $net_a_payer,
        ];

        $pdf = PDF::loadView('bulletins.pdf', $data);
        return $pdf->download('Bulletin_'.$employe->nom_complet.'.pdf');
    }
}
