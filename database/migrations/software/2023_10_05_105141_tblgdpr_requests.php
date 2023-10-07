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
        Schema::create('tblgdpr_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientid')->default(0);
            $table->unsignedBigInteger('contact_id')->default(0);
            $table->unsignedBigInteger('lead_id')->default(0);
            $table->string('request_type', 191)->nullable();
            $table->string('status', 40)->nullable();
            $table->datetime('request_date');
            $table->string('request_from', 150)->nullable();
            $table->text('description')->nullable();

            // Define foreign key constraints if needed
            // //$table->foreign('clientid')->references('id')->on('clients');
            // //$table->foreign('contact_id')->references('id')->on('contacts');
            // //$table->foreign('lead_id')->references('id')->on('leads');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblgdpr_requests');
    }
};
