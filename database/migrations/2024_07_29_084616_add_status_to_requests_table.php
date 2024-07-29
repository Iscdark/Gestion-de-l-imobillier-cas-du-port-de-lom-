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
        Schema::table('house_Requests', function (Blueprint $table) {
            $table->enum('status', ['en attente', 'approved', 'rejected'])->default('en attente');
        });
    }
    
    public function down()
    {
        Schema::table('house_requests', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
