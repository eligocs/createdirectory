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
        Schema::create('tblacc_account_type_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_type_id')->unsigned();
            $table->string('name', 255);
            $table->text('note')->nullable();
            $table->string('statement_of_cash_flows', 255)->nullable();
            $table->integer('order')->nullable();
            
            // Define foreign key constraint
            $table->foreign('account_type_id')->references('id')->on('account_types')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_account_type_details');
    }
};
