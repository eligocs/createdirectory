<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client_view_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('iti_id');
            $table->timestamp('last_visit')->default(now());
            $table->unsignedInteger('inactive_status')->default(0);

            //$table->foreign('client_id')->references('id')->on('clients'); // Assuming you have a 'clients' table
            //$table->foreign('agent_id')->references('id')->on('agents'); // Assuming you have an 'agents' table
            //$table->foreign('iti_id')->references('id')->on('itineraries'); // Assuming you have an 'itineraries' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_view_status');
    }
};
