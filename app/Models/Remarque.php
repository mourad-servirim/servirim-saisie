<?php

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'semaine', 'envoyé_le', 'fichier_pdf'];

    // 🔗 Un rapport appartient à un chef de site
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Un rapport peut contenir plusieurs réparations
    public function reparations()
    {
        return $this->hasMany(Reparation::class);
    }

    // 🔗 Un rapport peut avoir plusieurs remarques
    public function remarques()
    {
        return $this->hasMany(Remarque::class);
    }
}
