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
        Schema::create('agent_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('month', 20);
            $table->integer('target')->default(10)->comment('total target for month');
            $table->integer('incentive_view')->default(0)->comment('incentive page visits by agents');
            $table->unsignedBigInteger('target_assigned_by');
            $table->timestamp('updated')->default(now())->onUpdate(now()); 
            $table->foreign('user_id')->references('id')->on('users'); // Assuming you have a 'users' table
            $table->foreign('target_assigned_by')->references('id')->on('users'); // Assuming you have a 'users' table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_targets');
    }
};
