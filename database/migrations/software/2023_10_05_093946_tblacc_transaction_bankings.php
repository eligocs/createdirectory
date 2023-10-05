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
        Schema::create('tblacc_transaction_bankings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('withdrawals', 15, 2)->default(0.00);
            $table->decimal('deposits', 15, 2)->default(0.00);
            $table->string('payee', 255)->nullable();
            $table->text('description')->nullable();
            $table->datetime('datecreated')->nullable();
            $table->integer('addedfrom')->nullable();
            $table->string('transaction_id', 150)->nullable();
            $table->integer('bank_id')->nullable();
            $table->tinyInteger('status')->default(0)->comment('1=>posted, 2=>pending');
            $table->integer('matched')->default(0);
            $table->integer('reconcile')->default(0);
            $table->integer('adjusted')->default(0);
            $table->timestamps(); // You can include timestamps if needed.

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('addedfrom')->references('id')->on('your_addedfrom_table_name');
            // $table->foreign('bank_id')->references('id')->on('your_bank_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_transaction_bankings');
    }
};
