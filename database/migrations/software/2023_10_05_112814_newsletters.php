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
        Schema::create('newsletters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('temp_key', 10);
            $table->string('subject', 100);
            $table->string('slug', 100);
            $table->string('youtube_link', 100);
            $table->longText('body');
            $table->longText('emails');
            $table->tinyInteger('del_status')->default(0);
            $table->integer('agent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletters');
    }
};
