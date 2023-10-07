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
        Schema::create('tbladminclientreminders', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->date('date');
            $table->integer('isnotified')->default(0);
            $table->integer('clientid');
            $table->integer('staff');
            $table->integer('notify_by_email')->default(1);
            $table->integer('creator');
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the engine to MyISAM (not InnoDB), uncomment the following line:
            // $table->engine = 'MyISAM';

            // Define foreign key constraints if needed.
            // //$table->foreign('clientid')->references('id')->on('your_client_table_name');
            // //$table->foreign('staff')->references('id')->on('your_staff_table_name');
            // //$table->foreign('creator')->references('id')->on('your_creator_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbladminclientreminders');
    }
};
