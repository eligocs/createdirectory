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
        Schema::create('tblcreditnote_refunds', function (Blueprint $table) {
            $table->id();
            $table->integer('credit_note_id');
            $table->integer('staff_id');
            $table->date('refunded_on');
            $table->string('payment_mode', 40);
            $table->text('note')->nullable();
            $table->decimal('amount', 15, 2);
            $table->datetime('created_at')->nullable();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('credit_note_id')->references('id')->on('tblcreditnotes');
            // $table->foreign('staff_id')->references('id')->on('your_staff_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcreditnote_refunds');
    }
};
