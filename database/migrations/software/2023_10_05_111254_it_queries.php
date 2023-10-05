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
        Schema::create('it_queries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('mobile', 30);
            $table->string('destination', 255)->nullable();
            $table->string('package_name', 255)->nullable();
            $table->string('lang', 255)->nullable();
            $table->string('total_no_travelers', 255)->nullable();
            $table->string('query_from', 255)->comment('website name')->nullable();
            $table->integer('agent_id')->default(0)->comment('query assigned to agent');
            $table->integer('teamleader_assigned_status')->default(0)->comment('0=assigned to agent, 1=pending');
            $table->timestamps(0); // Use 0 for Laravel 7 and later
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('it_queries');
    }
};
