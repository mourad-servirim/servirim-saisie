<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PointageController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\RemarqueController;
use App\Http\Controllers\RapportController;

// Page d'accueil
Route::get('/', fn() => redirect()->route('login'));

// Authentification
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Tableau de bord (protégé)
Route::get('/dashboard', function () {
    if (! session()->has('user_name')) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
    }
    return view('dashboard');
})->name('dashboard');

// ✅ Routes propres
Route::get('/pointage', [PointageController::class, 'index'])->name('pointage.index');
Route::get('/pointage/create', [PointageController::class, 'create'])->name('pointage.create');
Route::post('/pointage', [PointageController::class, 'store'])->name('pointage.store');

// Routes manquantes pour EDIT, UPDATE, DELETE
Route::get('/pointage/{id}/edit', [PointageController::class, 'edit'])->name('pointage.edit');
Route::put('/pointage/{id}', [PointageController::class, 'update'])->name('pointage.update');
Route::delete('/pointage/{id}', [PointageController::class, 'destroy'])->name('pointage.destroy');



Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/remarques', [RemarqueController::class, 'index'])->name('remarques.index');
Route::get('/rapports', [RapportController::class, 'index'])->name('rapports.index');

Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');

// Afficher le formulaire de modification
Route::get('/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');

// Mettre à jour le stock
Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');



Route::get('/stock/create', [StockController::class, 'create'])->name('stock.create');
Route::post('/stock', [StockController::class, 'store'])->name('stock.store');
Route::get('/stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
Route::put('/stock/{id}', [StockController::class, 'update'])->name('stock.update');


Route::get('/reparations', [ReparationController::class, 'index'])->name('reparations.index');
Route::get('/reparations/create', [ReparationController::class, 'create'])->name('reparations.create');
Route::post('/reparations', [ReparationController::class, 'store'])->name('reparations.store');
use App\Http\Controllers\ReparationController;

Route::resource('reparations', ReparationController::class);



use App\Http\Controllers\BulletinController;


// ✅ PRIORITÉ MAX (mettre ici en premier)
Route::get('/pointage/fiche-mensuelle', [PointageController::class, 'ficheMensuelle'])
    ->name('pointage.ficheMensuelle');

Route::get('/pointage/fiche-mensuelle/print', [PointageController::class, 'printFicheMensuelle'])
    ->name('pointage.printFicheMensuelle');

    
Route::get('/bulletins/create', [BulletinController::class, 'create'])
    ->name('bulletins.create');

Route::post('/bulletins/generate', [BulletinController::class, 'generate'])
    ->name('bulletins.generate');
Route::get('/bulletins', function () {
    return redirect()->route('bulletins.create');
})->name('bulletins.index');

Route::get('/stock/print/all', [StockController::class, 'printAll'])->name('stock.printAll');
Route::get('/stock/{id}/print', [StockController::class, 'print'])->name('stock.print');
Route::get('/reparations/{id}/print', [ReparationController::class, 'print'])
    ->name('reparations.print');
Route::get('/pointage/{id}/print', [PointageController::class, 'print'])
    ->name('pointage.print');


Route::get('/reparations/print/all', [ReparationController::class, 'printAll'])
    ->name('reparations.printAll');

Route::get('/reparations/{id}/print', [ReparationController::class, 'print'])
    ->name('reparations.print');

Route::resource('reparations', ReparationController::class);

Route::get('/pointage/print/all', [PointageController::class, 'printAll'])
     ->name('pointage.printAll');

     Route::post('/pointage/store-multiple',[PointageController::class,'storeMultiple'])->name('pointage.storeMultiple');

      Route::delete('/pointage/delete-all', [PointageController::class, 'deleteAll'])
->name('pointage.deleteAll');


