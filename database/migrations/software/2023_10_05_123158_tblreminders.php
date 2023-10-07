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
        Schema::create('tblreminders', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->datetime('date');
            $table->integer('isnotified')->default(0);
            $table->integer('rel_id');
            $table->integer('staff');
            $table->string('rel_type', 40);
            $table->integer('notify_by_email')->default(1);
            $table->integer('creator');
            
            // Add foreign key constraints if necessary
            // //$table->foreign('rel_id')->references('id')->on('related_table');
            // //$table->foreign('staff')->references('id')->on('staff_table');
            // //$table->foreign('creator')->references('id')->on('creator_table');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblreminders');
    }
};
