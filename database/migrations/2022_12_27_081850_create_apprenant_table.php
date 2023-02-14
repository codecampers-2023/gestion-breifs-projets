<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apprenant', function (Blueprint $table) {
            $table->increments('id');
            $table->string("Nom")->nullable();
            $table->string("Prenom")->nullable();
            $table->string("Email")->nullable();
            $table->string("Phone")->nullable();
            $table->string("Adress")->nullable();
            $table->string("CIN")->nullable();
            $table->date("Date_naissance")->nullable();
            $table->string("Image")->nullable();
            // 
            $table->string("sexe")->nullable();
            $table->string("Etudiant_actif")->nullable();
            $table->string("Diplome")->nullable();
            $table->Date("Date_inscription")->nullable();
            $table->string("Lieu_naissance")->nullable();
            $table->string("sexe")->nullable();
            $table->string("Etudiant_actif")->nullable();
            $table->string("Diplome")->nullable();
            $table->Date("Date_inscription")->nullable();
            $table->string("Lieu_naissance")->nullable();
            $table->integer("Numero_telephone")->nullable(); //test.
            $table->string("Nom_arabe")->nullable();
            $table->string("Prenom_arabe")->nullable();
            $table->string("Niveau_Scoliare")->nullable();
            $table->string("Nom_arabe")->nullable();
            $table->string("Prenom_arabe")->nullable();
            $table->string("Niveau_Scoliare")->nullable();
        });

        Schema::create('annee_formation', function (Blueprint $table) {
            
         $table->increments('id');
         $table->date('date_debut');
         $table->date('date_fin');
         $table->string('ref'); // adnane : To verify if column type should be Year?
        });



    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apprenant');
    }
};
