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
         Schema::create('ac_bank_cash_account_listing', function (Blueprint $table) {
            $table->id();
            $table->string('account_type')->default('bank'); 
            $table->string('account_name')->nullable(); 
            $table->string('account_number')->nullable(); 
            $table->string('ifsc_code')->nullable();
            $table->text('address')->nullable();
            $table->text('remarks')->nullable(); 
            $table->integer('acc_status')->default(0)->comment('0 = active , 1 = blacklist'); 
            $table->integer('del_status')->default(0); 
            $table->integer('updated_by')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_bank_cash_account_listing');
    }
};
