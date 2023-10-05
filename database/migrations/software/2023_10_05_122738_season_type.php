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
        Schema::create('season_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('season_name', 200);
            $table->text('season_date');
            $table->integer('del_status')->default(0);
            $table->timestamp('created')->default(\DB::raw('current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('season_type');
    }
};
