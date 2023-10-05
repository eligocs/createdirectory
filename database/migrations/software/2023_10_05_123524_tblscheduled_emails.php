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
        Schema::create('tblscheduled_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rel_id');
            $table->string('rel_type', 15);
            $table->datetime('scheduled_at');
            $table->string('contacts', 197);
            $table->text('cc')->nullable();
            $table->tinyInteger('attach_pdf')->default(1);
            $table->string('template', 197);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblscheduled_emails');
    }
};
