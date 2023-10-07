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
        Schema::create('tbllead_activity_log', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leadid');
            $table->mediumText('description');
            $table->text('additional_data')->nullable();
            $table->datetime('date');
            $table->unsignedBigInteger('staffid');
            $table->string('full_name', 100)->nullable();
            $table->tinyInteger('custom_activity')->default(0);

            // Define foreign key constraints
            //$table->foreign('leadid')->references('id')->on('tblleads')->onDelete('cascade');
            //$table->foreign('staffid')->references('id')->on('tblstaff')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbllead_activity_log');
    }
};
