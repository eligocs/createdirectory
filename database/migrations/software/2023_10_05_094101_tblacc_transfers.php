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
        Schema::create('tblacc_transfers', function (Blueprint $table) {
            $table->id();
            $table->integer('transfer_funds_from');
            $table->integer('transfer_funds_to');
            $table->decimal('transfer_amount', 15, 2)->nullable();
            $table->string('date', 45)->nullable();
            $table->text('description')->nullable();
            $table->datetime('datecreated')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('transfer_funds_from')->references('id')->on('your_source_account_table_name');
            // $table->foreign('transfer_funds_to')->references('id')->on('your_destination_account_table_name');
            // $table->foreign('addedfrom')->references('id')->on('your_addedfrom_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_transfers');
    }
};
