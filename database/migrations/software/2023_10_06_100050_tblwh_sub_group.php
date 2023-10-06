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
        Schema::create('tblwh_sub_group', function (Blueprint $table) {
            $table->id();
            $table->string('sub_group_code', 100)->nullable();
            $table->text('sub_group_name');
            $table->integer('order')->nullable();
            $table->integer('display')->nullable()->comment('1: display (yes), 0: not displayed (no)');
            $table->text('note')->nullable();
            $table->integer('group_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblwh_sub_group');
    }
};
