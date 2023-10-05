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
        Schema::create('tblshared_customer_files', function (Blueprint $table) {
            $table->increments('file_id');
            $table->unsignedInteger('contact_id');
            
            // Define foreign key constraint
            $table->foreign('contact_id')
                  ->references('id')
                  ->on('contacts')
                  ->onDelete('cascade'); // Cascade delete if contact is deleted
            
            $table->timestamps(); // Optional timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblshared_customer_files');
    }
};
