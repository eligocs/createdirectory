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
        Schema::create('tblpurchase_option', function (Blueprint $table) {
            $table->id('option_id');
            $table->string('option_name', 200);
            $table->longText('option_val')->nullable();
            $table->tinyInteger('auto')->nullable(); 
        });
        DB::statement('ALTER TABLE tblpurchase_option AUTO_INCREMENT = 14;');
    }
 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpurchase_option');
    }
};
