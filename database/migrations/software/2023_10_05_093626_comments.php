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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iti_id');
            $table->unsignedBigInteger('acc_id')->comment('accommodation id');
            $table->string('temp_key', 100);
            $table->string('package_type', 50)->default('holidays')->comment('holidays/accommodation/cab');
            $table->text('comment_content');
            $table->string('client_name', 100)->comment('Client Name');
            $table->string('client_contact', 100);
            $table->string('comment_by', 20)->comment('comment by client Or agent');
            $table->unsignedBigInteger('agent_id')->default(0);
            $table->timestamps();

            $table->foreign('iti_id')->references('id')->on('itineraries');
            $table->foreign('acc_id')->references('id')->on('accommodations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');   
    }
};
