<?php

namespace App\Http\Controllers;

use App\Models\Reparation;
use App\Models\Pointage;
use Illuminate\Support\Facades\DB;

class RapportController extends Controller
{
    public function index()
    {
        // Réparations par jour
        $reparationsParJour = Reparation::select(
                DB::raw('DATE(date_entree) as jour'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('jour')
            ->orderBy('jour')
            ->get();

        // Présence / Absence
        $presence = Pointage::where('present', 1)->count();
        $absence  = Pointage::where('present', 0)->count();

        // Total pneus réparés
        $pneusRepares = Pointage::sum('nb_pneus_repares');

        return view('rapports', compact(
            'reparationsParJour',
            'presence',
            'absence',
            'pneusRepares'
        ));
    }
}
