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
        Schema::create('tbluser_auto_login', function (Blueprint $table) {
            $table->char('key_id', 32);
            $table->integer('user_id');
            $table->string('user_agent', 150);
            $table->string('last_ip', 40);
            $table->timestamp('last_login')->useCurrent();
            $table->integer('staff');

            $table->primary('key_id');
            //$table->foreign('user_id')->references('id')->on('users');
            // Add any additional foreign key constraints if needed

            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbluser_auto_login');
    }
};
