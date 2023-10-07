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
        Schema::create('vehicle_package_list', function (Blueprint $table) {
            $table->id();
            $table->integer('state_id')->unsigned();
            $table->string('package_name', 255);
            $table->timestamp('updated_on')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps(); // Adds created_at and updated_at columns

            // Define foreign key constraint
            //$table->foreign('state_id')
                // ->references('id')
                // ->on('states')
                // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_package_list');
    }
};
