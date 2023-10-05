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
        Schema::create('iti_clients_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->integer('customer_id');
            $table->string('file_url', 255);
            $table->tinyText('comment');
            $table->integer('agent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_clients_docs');
    }
};
