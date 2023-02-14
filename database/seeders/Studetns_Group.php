<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Studetns_Group extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $students = [
            ['nom' => 'Tebbaa', 'Prenom' => "Adnane"],
            ['nom' => 'ElMliki', 'Prenom' => "Hicham"],
            ['nom' => 'Merradou', 'Prenom' => "Abderahmane"],
            ['nom' => 'Yahya', 'Prenom' => "Mohammed"],
            ['nom' => 'Barina', 'Prenom' => "Bilal"],
            ['nom' => 'Lharrak', 'Prenom' => "Boutaina"],
            ['nom' => 'Stitou', 'Prenom' => "Nada"],
            ['nom' => 'Imane', 'Prenom' => "Najim"],
            ['nom' => 'Imane', 'Prenom' => "Ajroudi"],
            ['nom' => 'Tsouli', 'Prenom' => "Ihassane"],
            ['nom' => 'Ahouzi', 'Prenom' => "Hasane"],
            ['nom' => 'Elkaissi', 'Prenom' => "Zayd"],
            ['nom' => 'Ben-ayad', 'Prenom' => "Aicha"],
            //
            ['nom' => 'Madani', 'Prenom' => "Madani"],
            ['nom' => 'Mustrafa', 'Prenom' => "Madan"],
            ['nom' => 'Mohamed', 'Prenom' => "Madani"],
            ['nom' => 'Majdi', 'Prenom' => "Madani"],
            ['nom' => 'Maher', 'Prenom' => "Madani"],
            ['nom' => 'Mukhtar', 'Prenom' => "Madani"],
            ['nom' => 'Mansour', 'Prenom' => "Madani"],

        ];

        $groups = [
            ['Nom_groupe' => 'CodeCampers'],
            ['Nom_groupe' => 'Debuggers'],
        ];

        DB::table('apprenant')->insert($students);
        DB::table('groupes')->insert($groups);

    }
}
