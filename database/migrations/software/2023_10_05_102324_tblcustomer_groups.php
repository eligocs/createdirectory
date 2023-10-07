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
        Schema::create('tblcustomer_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('groupid');
            $table->unsignedBigInteger('customer_id');

            // Define foreign key constraints if needed.
            // //$table->foreign('groupid')->references('id')->on('group_table_name');
            // //$table->foreign('customer_id')->references('id')->on('customer_table_name');

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcustomer_groups');
    }
};
