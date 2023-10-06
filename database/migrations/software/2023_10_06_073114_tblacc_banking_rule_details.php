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
        Schema::create('tblacc_banking_rule_details', function (Blueprint $table) {
            $table->id();
            $table->integer('rule_id');
            $table->string('type', 45)->nullable();
            $table->string('subtype', 45)->nullable();
            $table->string('text', 255)->nullable();
            $table->string('subtype_amount', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_banking_rule_details');
    }
};
