<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\StockItem;

class StockController extends Controller
{
    // Affiche tous les articles
    public function index()
    {
        $stocks = StockItem::all();
        return view('stock.index', compact('stocks'));
    }

    // Affiche le formulaire pour ajouter un nouvel article
    public function create()
    {
        return view('stock.create'); // Formulaire pour ajouter
    }

    // Stocke le nouvel article
    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required',
            'designation' => 'required',
            'code' => 'nullable',
            'qte_retiree' => 'required|integer',
            'qte_restante' => 'required|integer',
        ]);

        StockItem::create($request->all());

        return redirect()->route('stock.index')->with('success', 'Article ajouté avec succès !');
    }

    // Affiche le formulaire pour modifier un article existant
    public function edit($id)
    {
        $stock = StockItem::findOrFail($id);
        return view('stock.edit', compact('stock'));
    }

    // Met à jour l'article
    public function update(Request $request, $id)
    {
        $request->validate([
            'item' => 'required',
            'designation' => 'required',
            'code' => 'nullable',
            'qte_retiree' => 'required|integer',
            'qte_restante' => 'required|integer',
        ]);

        $stock = StockItem::findOrFail($id);
        $stock->update($request->all());

        return redirect()->route('stock.index')->with('success', 'Article mis à jour avec succès !');

    }

          // Supprimer un article
public function destroy($id)
{
    $stock = StockItem::findOrFail($id);
    $stock->delete();

    return redirect()->route('stock.index')
        ->with('success', 'Article supprimé avec succès !');
}



              public function printAll()
{
    $stocks = StockItem::all();

    $company = [
        'nom' => 'SERVIRIM',
        'capital' => '1.000.000 MRO',
        'nif' => '10724265',
        'rc' => '77471',
        'cnss_employeur' => '11092',
        'adresse' => 'Rue Sidi Mohamed Ould Cheikh Abdallahi, K, Ext S3 n° 0069D, Nouakchott, Mauritanie',
        'telephone' => '+222 45 24 53 84',
        'email' => 'contact@servirim.com',
        'site' => 'www.servirim.com',
        'compte_bancaire' => '0209120005GBM',
    ];

    $pdf = \PDF::loadView('stock.pdf_all', compact('stocks','company'));
    return $pdf->stream('liste-stock.pdf');
}






}



