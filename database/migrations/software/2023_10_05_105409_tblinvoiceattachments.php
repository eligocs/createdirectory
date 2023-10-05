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
        Schema::create('tblinvoiceattachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoiceid');
            $table->string('file_name', 50);
            $table->mediumText('original_file_name');
            $table->string('filetype', 25);
            $table->dateTime('datecreated');

            // Define foreign key constraint
            $table->foreign('invoiceid')->references('id')->on('tblinvoices')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblinvoiceattachments');
    }
};
