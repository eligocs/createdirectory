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
        Schema::create('tblcontractrenewals', function (Blueprint $table) {
            $table->id();
            $table->integer('contractid');
            $table->date('old_start_date');
            $table->date('new_start_date');
            $table->date('old_end_date');
            $table->date('new_end_date');
            $table->decimal('old_value', 11, 2)->nullable();
            $table->decimal('new_value', 11, 2)->nullable();
            $table->datetime('date_renewed');
            $table->integer('renewed_by');

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'MyISAM';

            // Define foreign key constraints if needed.
            // $table->foreign('contractid')->references('id')->on('your_contract_table_name');
            // $table->foreign('renewed_by')->references('id')->on('your_user_table_name');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontractrenewals');
    }
};
