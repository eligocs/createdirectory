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
        Schema::create('tblnotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rel_id');
            $table->string('rel_type', 20);
            $table->text('description')->nullable();
            $table->datetime('date_contacted')->nullable();
            $table->unsignedBigInteger('addedfrom');
            $table->datetime('dateadded');
            $table->timestamps();

            // Define foreign keys
            //$table->foreign('addedfrom')->references('id')->on('tblusers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnotes');
    }
};
