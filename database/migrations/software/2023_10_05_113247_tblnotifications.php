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
        Schema::create('tblnotifications', function (Blueprint $table) {
            $table->id();
            $table->integer('isread');
            $table->tinyInteger('isread_inline');
            $table->dateTime('date');
            $table->text('description');
            $table->integer('fromuserid');
            $table->integer('fromclientid')->default(0);
            $table->string('from_fullname', 100);
            $table->integer('touserid');
            $table->integer('fromcompany')->nullable();
            $table->mediumText('link')->nullable();
            $table->text('additional_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblnotifications');
    }
};
