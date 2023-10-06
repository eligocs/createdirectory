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
        Schema::create('tbluser_meta', function (Blueprint $table) {
            $table->bigIncrements('umeta_id');
            $table->bigInteger('staff_id')->default(0);
            $table->bigInteger('client_id')->default(0);
            $table->bigInteger('contact_id')->default(0);
            $table->string('meta_key', 191)->nullable();
            $table->longText('meta_value');

            $table->index(['staff_id', 'client_id', 'contact_id', 'meta_key']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbluser_meta');
    }
};
