<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * La méthode pour appliquer les modifications à la table.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('house_id')->constrained()->onDelete('cascade');
            
            // Colonnes pour les informations personnelles
            $table->string('name');
            $table->string('first_name');
            $table->year('birth_year');
            $table->string('address');
            $table->string('profession_at_port');
            
            // Colonnes pour les statuts
            $table->enum('service_status', ['en attente', 'approved', 'rejected'])
                  ->default('en attente');
            $table->enum('dg_status', ['en attente', 'approved', 'rejected'])
                  ->default('en attente');
            $table->enum('initial_status', ['en attente', 'approved', 'rejected'])
                  ->default('en attente');
            
            // Colonnes pour les détails de la demande
            $table->string('motif')->nullable();
            $table->string('letter');
            
            $table->timestamps();
        });
    }

    /**
     * La méthode pour annuler les modifications appliquées à la table.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
