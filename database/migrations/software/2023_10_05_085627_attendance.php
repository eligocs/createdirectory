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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->string('time_in', 100);
            $table->string('time_out', 100);
            $table->string('login_date', 100);
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
            $table->tinyInteger('admin_approved')->default(0)->comment('0=approved, 1=unapproved'); 
            $table->foreign('agent_id')->references('id')->on('agents'); // Assuming you have an 'agents' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
