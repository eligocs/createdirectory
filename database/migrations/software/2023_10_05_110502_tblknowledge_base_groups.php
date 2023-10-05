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
        Schema::create('tblknowledge_base_groups', function (Blueprint $table) {
            $table->id('groupid');
            $table->string('name', 191);
            $table->text('group_slug')->nullable();
            $table->mediumText('description')->nullable();
            $table->tinyInteger('active');
            $table->string('color', 10)->default('#28B8DA');
            $table->integer('group_order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblknowledge_base_groups');
    }
};
