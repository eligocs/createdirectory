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
        Schema::create('msg_log', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message', 500);
            $table->text('sent_to');
            $table->tinyInteger('del_status')->default(0)->comment('1=deleted');
            $table->integer('agent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('msg_log');
    }
};
