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
        Schema::create('tblleadattachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leadid');
            $table->mediumText('file_name');
            $table->string('filetype', 50)->nullable();
            $table->mediumText('original_file_name');
            $table->unsignedBigInteger('addedfrom');
            $table->datetime('dateadded');
            
            //$table->foreign('leadid')->references('id')->on('your_lead_table_name')->onDelete('cascade');
            //$table->foreign('addedfrom')->references('id')->on('your_users_table_name')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblleadattachments');
    }
};
