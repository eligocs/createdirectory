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
        Schema::create('tblacc_journal_entries', function (Blueprint $table) {
            $table->id();
            $table->string('number', 45)->nullable();
            $table->text('description')->nullable();
            $table->date('journal_date')->nullable();
            $table->decimal('amount', 15, 2)->default(0.00);
            $table->datetime('datecreated')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('addedfrom')->references('id')->on('your_addedfrom_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_journal_entries');
    }
};
