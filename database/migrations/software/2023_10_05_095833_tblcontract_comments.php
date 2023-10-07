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
        Schema::create('tblcontract_comments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content')->nullable();
            $table->integer('contract_id');
            $table->integer('staffid');
            $table->datetime('dateadded');

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('contract_id')->references('id')->on('tblcontracts');
            // //$table->foreign('staffid')->references('id')->on('your_staff_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontract_comments');
    }
};
