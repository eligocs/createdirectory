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
        Schema::create('vehicles_rates_by_tour', function (Blueprint $table) {
            $table->id();
            $table->integer('vehicle_id')->comment('vehicle.id');
            $table->string('c_type', 50)->comment('Ac/N.A/C');
            $table->integer('state')->comment('state id');
            $table->string('tour_name', 255)->comment('package name with duration');
            $table->integer('tour_cost');
            $table->integer('updated_by')->comment('agent id');
            $table->timestamp('updated_on')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps(); // Adds created_at and updated_at columns
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles_rates_by_tour');
    }
};
