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
        Schema::create('sentoffers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('temp_key', 10);
            $table->string('subject', 100);
            $table->string('slug', 100);
            $table->longText('body');
            $table->longText('emails');
            $table->integer('agent_id');
            $table->integer('del_status')->default(0);
            $table->timestamp('updated')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
            $table->timestamp('created')->default(\DB::raw('current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentoffers');
    }
};
