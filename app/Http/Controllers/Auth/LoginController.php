<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Liste des utilisateurs autorisés
    private $allowedUsers = [
        [
            'name' => 'Admin',
            'email' => 'admin@servirim.com',
            'password' => '46212260',
            'site' => 'Zouerate',
            'role' => 'admin',
        ],
        [
            'name' => 'Chef de site',
            'email' => 'chef@servirim.com',
            'password' => '12345678',
            'site' => 'Zouerate',
            'role' => 'chef',
        ],
    ];

    // Affichage formulaire login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Traitement login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        foreach ($this->allowedUsers as $user) {
            if ($user['email'] === $request->email && $user['password'] === $request->password) {
                // Sauvegarde session
                session([
                    'user_name' => $user['name'],
                    'user_email' => $user['email'],
                    'user_role' => $user['role'],
                    'user_site' => $user['site'],
                ]);

                // Redirection vers le dashboard
                return redirect()->route('dashboard')->with('success', 'Bienvenue ' . $user['name']);
            }
        }

        return back()->with('error', 'Identifiants invalides.');
    }

    // Déconnexion
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'Déconnecté avec succès.');
    }
}
