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
        Schema::create('iti_email_followup', function (Blueprint $table) {
            $table->id();
            $table->integer('iti_id');
            $table->integer('customer_id');
            $table->string('customer_name', 200);
            $table->string('customer_contact', 200);
            $table->string('customer_email', 200);
            $table->string('sent_to', 200)->comment('manager,customer,agent');
            $table->integer('agent_id');
            $table->timestamp('sent_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iti_email_followup');
    }
};
