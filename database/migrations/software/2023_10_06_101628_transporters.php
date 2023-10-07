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
        Schema::create('transporters', function (Blueprint $table) {
            $table->id();
            $table->string('trans_name', 200);
            $table->string('trans_email', 100);
            $table->string('trans_contact', 100);
            $table->string('trans_address', 500);
            $table->string('trans_cars_list', 200);
            $table->integer('del_status')->default(0);
            $table->timestamp('created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transporters');
    }
};
