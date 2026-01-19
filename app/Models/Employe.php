<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_complet',
        'nni',
        'cnss',
        'cnam',
        'fonction',
        'categorie',
        'salaire_base',
        'heures',
        'lieu_travail',
    ];
}
