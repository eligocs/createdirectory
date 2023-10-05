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
        Schema::create('tblgoals', function (Blueprint $table) {
            $table->id();
            $table->string('subject', 400);
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('goal_type');
            $table->unsignedBigInteger('contract_type')->default(0);
            $table->unsignedBigInteger('achievement');
            $table->unsignedBigInteger('addedfrom');
            $table->unsignedBigInteger('assigned')->nullable()->comment('test');
            $table->tinyInteger('notify_when_fail')->default(1);
            $table->tinyInteger('notify_when_achieve')->default(1);
            $table->unsignedBigInteger('notified')->default(0);

            // Define foreign key constraints if needed
            // $table->foreign('goal_type')->references('id')->on('goal_type_table');
            // $table->foreign('achievement')->references('id')->on('achievement_table');
            // $table->foreign('addedfrom')->references('id')->on('users');
            // $table->foreign('assigned')->references('id')->on('assigned_table');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblgoals');
    }
};
