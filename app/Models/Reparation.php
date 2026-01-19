<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'date_entree',
        'date_sortie',
        'type_reparation',
        'emplatre_rad',
        'gomme_mtr',
        'verre_dissolut',
        'duree_reparation',
    ];
}
