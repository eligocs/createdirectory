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
        Schema::create('tbltickets_status', function (Blueprint $table) {
            $table->id('ticketstatusid');
            $table->string('name', 50);
            $table->integer('isdefault')->default(0);
            $table->string('statuscolor', 7)->nullable();
            $table->integer('statusorder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltickets_status');
    }
};
