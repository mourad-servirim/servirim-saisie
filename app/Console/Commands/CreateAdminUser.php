<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'make:admin 
                            {name=Admin : Nom de l\'admin} 
                            {email=admin@servirim.com : Email de l\'admin} 
                            {password=12345678 : Mot de passe} 
                            {site=Zouerate : Site d\'affectation}';

    protected $description = 'Créer un utilisateur administrateur';

    public function handle()
    {
        $user = User::updateOrCreate(
            ['email' => $this->argument('email')],
            [
                'name' => $this->argument('name'),
                'email' => $this->argument('email'),
                'password' => Hash::make($this->argument('password')),
                'role' => 'admin',
                'site' => $this->argument('site'),
            ]
        );

        $this->info("✅ Admin créé/MAJ avec succès : {$user->email}");
    }
}
