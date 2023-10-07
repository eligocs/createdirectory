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
        Schema::create('assign_user_area', function (Blueprint $table) {
            $table->id();
            $table->string('user', 20);
            $table->string('state', 100);
            $table->text('city');
            $table->string('place', 255);
            $table->string('category', 100);
            $table->timestamp('date');
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_user_area');
    }
};
