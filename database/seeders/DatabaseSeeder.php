<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;



use App\Models\Apprenant;

use App\Models\Groupes;


class DatabaseSeeder extends Seeder
{
  public function run (){


    Groupes::factory(2)->create();
    Apprenant::factory(5)->create();

  }
}
