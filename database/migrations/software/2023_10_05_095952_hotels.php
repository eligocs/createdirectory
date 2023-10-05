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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('hotel_category', 100);
            $table->string('hotel_name', 200);
            $table->text('hotel_email');
            $table->string('hotel_address', 200);
            $table->string('hotel_contact', 100);
            $table->string('hotel_website', 200);
            $table->string('hotel_image', 200);
            $table->integer('del_status')->default(0);
            $table->timestamps();
            $table->string('room_category')->nullable();
            $table->string('seasons')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
