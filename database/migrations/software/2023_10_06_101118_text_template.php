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
        Schema::create('text_template', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 100);
            $table->timestamp('created_at')->default(now());
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00')->onUpdate(now());
            $table->string('greeting', 100);
            $table->string('welcome_note', 100);
            $table->string('day_wis_Iti', 2000);
            $table->string('inclusion', 2000);
            $table->string('hotel_type', 300);
            $table->string('hotel_price', 300);
            $table->integer('template_type')->default(1)->comment('2=accommodation, 1=holiday');
            $table->string('offer', 100);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('text_template');
    }
};
