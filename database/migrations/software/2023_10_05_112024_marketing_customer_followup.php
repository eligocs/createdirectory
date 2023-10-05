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
        Schema::create('marketing_customer_followup', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('temp_key', 100);
            $table->string('callType', 200);
            $table->string('callSummary', 200);
            $table->string('comment', 200);
            $table->string('nextCallDate', 200);
            $table->string('customer_prospect', 200);
            $table->string('currentCallTime', 200);
            $table->integer('call_status')->default(0)->comment('0=call pending,1=done');
            $table->integer('agent_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_customer_followup');
    }
};
