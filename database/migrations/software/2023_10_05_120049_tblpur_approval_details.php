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
        Schema::create('tblpur_approval_details', function (Blueprint $table) {
            $table->id();
            $table->integer('rel_id');
            $table->string('rel_type', 45);
            $table->string('staffid', 45)->nullable();
            $table->string('approve', 45)->nullable();
            $table->text('note')->nullable();
            $table->dateTime('date')->nullable();
            $table->string('approve_action', 255)->nullable();
            $table->string('reject_action', 255)->nullable();
            $table->string('approve_value', 255)->nullable();
            $table->string('reject_value', 255)->nullable();
            $table->integer('staff_approve')->nullable();
            $table->string('action', 45)->nullable();
            $table->integer('sender')->nullable();
            $table->dateTime('date_send')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_approval_details');
    }
};
