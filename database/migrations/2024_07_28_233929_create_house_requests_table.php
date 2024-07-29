<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('house_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Référence à l'utilisateur
            $table->foreignId('house_id')->constrained()->onDelete('cascade'); // Référence à la maison
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('profession');
            $table->string('marital_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('house_requests');
    }
};
