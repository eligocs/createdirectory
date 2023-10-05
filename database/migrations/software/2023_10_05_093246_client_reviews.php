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
        Schema::create('client_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('client_name', 150);
            $table->string('client_contact', 150);
            $table->string('package_name', 200);
            $table->string('client_logo', 200);
            $table->text('feedback');
            $table->unsignedInteger('rating')->default(0)->comment('1-5 star');
            $table->unsignedInteger('in_slider')->default(0)->comment('1=true,0=false');
            $table->unsignedBigInteger('agent_id');
            $table->unsignedInteger('del_status')->default(0);
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents'); // Assuming you have an 'agents' table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_reviews');
    }
};
