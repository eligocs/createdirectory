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
        Schema::create('tbllead_integration_emails', function (Blueprint $table) {
            $table->id();
            $table->mediumText('subject')->nullable();
            $table->mediumText('body')->nullable();
            $table->datetime('dateadded');
            $table->unsignedBigInteger('leadid');
            $table->unsignedBigInteger('emailid');

            // Define foreign key constraints
            $table->foreign('leadid')->references('id')->on('tblleads')->onDelete('cascade');
            $table->foreign('emailid')->references('id')->on('tblemails')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbllead_integration_emails');
    }
};
