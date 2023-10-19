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
        Schema::create('tblacc_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('key_name', 255)->nullable();
            $table->string('number', 45)->nullable();
            $table->integer('parent_account')->nullable();
            $table->integer('account_type_id');
            $table->integer('account_detail_type_id');
            $table->decimal('balance', 15, 2)->nullable();
            $table->text('balance_as_of')->nullable();
            $table->text('description')->nullable();
            $table->integer('default_account')->default(0);
            $table->integer('active')->default(1);
            $table->text('access_token')->nullable();
            $table->string('account_id', 255)->nullable();
            $table->tinyInteger('plaid_status')->default(0)->comment('1=>verified, 0=>not verified');
            $table->string('plaid_account_name', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblacc_accounts');
    }
};
