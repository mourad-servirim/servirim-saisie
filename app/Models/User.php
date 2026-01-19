<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role', 'site'];

    // 🔗 Un utilisateur (chef de site) peut envoyer plusieurs rapports
    public function rapports()
    {
        return $this->hasMany(Rapport::class);
    }
}
