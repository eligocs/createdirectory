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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id('bank_id'); // Renaming 'bank_id' to 'id' and setting it as the primary key
            $table->string('bank_name', 100);
            $table->string('payee_name', 100);
            $table->string('account_type', 30);
            $table->bigInteger('account_number');
            $table->string('ifsc_code', 20);
            $table->string('branch_address', 200);
            $table->tinyInteger('del_status')->default(0);
            $table->string('status', 10)->default('active');
            $table->timestamps(6); // Adds 'added_date' with microseconds
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_details');
    }
};
