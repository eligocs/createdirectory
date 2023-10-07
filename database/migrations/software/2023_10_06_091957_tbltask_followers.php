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
        Schema::create('tbltask_followers', function (Blueprint $table) {
            $table->id();
            $table->integer('staffid');
            $table->integer('taskid');
            $table->timestamps();

            // Define foreign key relationships if necessary
            // //$table->foreign('staffid')->references('id')->on('staff');
            // //$table->foreign('taskid')->references('id')->on('tbltasks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltask_followers');
    }
};
