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
        Schema::create('tblware_unit_type', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_type_id');
            $table->string('unit_code', 100)->nullable();
            $table->text('unit_name');
            $table->text('unit_symbol');
            $table->integer('order')->nullable();
            $table->integer('display')->nullable()->comment('1: display (yes), 0: not displayed (no)');
            $table->text('note')->nullable();

            $table->primary('unit_type_id');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblware_unit_type');
    }
};
