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
        Schema::create('iti_followup', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('iti_id');
            $table->enum('iti_type', ['1', '2'])->default('1')->comment('1=itinerary,2=accommodation');
            $table->string('temp_key', 200);
            $table->integer('parent_iti_id')->default(0)->comment('parent itinerary ID');
            $table->string('callType', 200);
            $table->longText('callSummary');
            $table->longText('comment')->nullable();
            $table->string('nextCallDate', 200);
            $table->string('itiProspect', 200);
            $table->string('currentCallTime', 200);
            $table->integer('call_status')->default(0)->comment('1=done,0=pending');
            $table->integer('agent_id');
            $table->timestamp('created')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_followup');
    }
};
