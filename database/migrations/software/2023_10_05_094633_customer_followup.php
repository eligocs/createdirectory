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
        Schema::create('customer_followup', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('temp_key', 100);
            $table->string('callType', 200);
            $table->longText('callSummary');
            $table->longText('comment');
            $table->string('nextCallDate', 200);
            $table->string('customer_prospect', 200);
            $table->string('currentCallTime', 200);
            $table->integer('call_status')->default(0)->comment('1=done,0=pending');
            $table->unsignedBigInteger('agent_id');
            $table->timestamps();
            $table->timestamp('created')->default(now());
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_followup');  
    }
};
