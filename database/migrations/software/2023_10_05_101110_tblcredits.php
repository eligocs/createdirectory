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
        Schema::create('tblcredits', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->integer('credit_id');
            $table->integer('staff_id');
            $table->date('date');
            $table->datetime('date_applied');
            $table->decimal('amount', 15, 2);

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('invoice_id')->references('id')->on('tblinvoices');
            // $table->foreign('staff_id')->references('id')->on('your_staff_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcredits');
    }
};
