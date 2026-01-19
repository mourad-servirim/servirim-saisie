<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'semaine', 'envoyé_le', 'fichier_pdf'];

    // 🔗 Un rapport appartient à un utilisateur (chef de site)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Un rapport peut avoir plusieurs remarques
    public function remarques()
    {
        return $this->hasMany(Remarque::class);
    }
}
