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
        Schema::create('tblticket_replies', function (Blueprint $table) {
            $table->id();
            $table->integer('ticketid');
            $table->integer('userid')->nullable();
            $table->integer('contactid')->default(0);
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->datetime('date');
            $table->text('message');
            $table->integer('attachment')->nullable();
            $table->integer('admin')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblticket_replies');
    }
};
