<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employe;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employes = [
            [
                'nom_complet' => 'Abdel Kader Hachem Guelaye',
                'nni' => '3739354851',
                'cnss' => '13062710',
                'fonction' => 'Technicien Sous-Chef d\'équipe',
                'categorie' => 'Technicien Sous-Chef d\'équipe',
                'salaire_base' => 17684,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'ABDELLAHI AMADOU SARR',
                'nni' => '4234824837',
                'cnss' => '13062718',
                'fonction' => 'Technicien chef d\'équipe - Superviseur',
                'categorie' => 'Technicien chef d\'équipe',
                'salaire_base' => 38698,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Ibrahima Abou Toure',
                'nni' => '1611711261',
                'cnss' => '13062713',
                'fonction' => 'Technicien Manœuvre',
                'categorie' => 'Technicien Manœuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Ousmane Aly Mohamed',
                'nni' => '2557954118',
                'cnss' => '13062712',
                'fonction' => 'Technicien Manoeuvre',
                'categorie' => 'Manoeuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Abou Djiby Niang',
                'nni' => '3346246540',
                'cnss' => '13058014',
                'fonction' => 'Technicien Manoeuvre',
                'categorie' => 'Manoeuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Lehssene Ahmed Mohamed',
                'nni' => '0071476391',
                'cnss' => '13058016',
                'fonction' => 'Technicien Manoeuvre',
                'categorie' => 'Manoeuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Mamadou Tidjane Fadiga',
                'nni' => '6457150321',
                'cnss' => '13058011',
                'fonction' => 'Technicien Sous-Chef d\'équipe',
                'categorie' => 'Technicien Sous-Chef d\'équipe',
                'salaire_base' => 17684,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Mahmoud Aly Thiam',
                'nni' => '0358191707',
                'cnss' => '13060996',
                'fonction' => 'Technicien Manoeuvre',
                'categorie' => 'Manoeuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Ramadane Bah M\'haimid',
                'nni' => '4462181294',
                'cnss' => '13062942',
                'fonction' => 'Manœuvre technicien',
                'categorie' => 'Manoeuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Mohamed Ahmed Remdhane',
                'nni' => '4089059736',
                'cnss' => '13058009',
                'fonction' => 'Technicien Manoeuvre',
                'categorie' => 'Manoeuvre',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
            [
                'nom_complet' => 'Cheikh Mohamed Soula',
                'nni' => '6242824941',
                'cnss' => '13058012',
                'fonction' => 'Technicien Sous-Chef d\'équipe',
                'categorie' => 'Technicien Sous-Chef d\'équipe',
                'salaire_base' => 11269,
                'lieu_travail' => 'SNIM',
            ],
        ];

        foreach ($employes as $employe) {
            // Crée ou met à jour selon le NNI
            Employe::updateOrCreate(
                ['nni' => $employe['nni']], // condition unique
                $employe // données à insérer ou mettre à jour
            );
        }
    }
}
