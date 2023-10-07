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
        Schema::create('tblcontract_renewals', function (Blueprint $table) {
            $table->id();
            $table->integer('contractid');
            $table->date('old_start_date');
            $table->date('new_start_date');
            $table->date('old_end_date')->nullable();
            $table->date('new_end_date')->nullable();
            $table->decimal('old_value', 15, 2)->nullable();
            $table->decimal('new_value', 15, 2)->nullable();
            $table->datetime('date_renewed');
            $table->string('renewed_by', 100);
            $table->integer('renewed_by_staff_id')->default(0);
            $table->integer('is_on_old_expiry_notified')->default(0);

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('contractid')->references('id')->on('tblcontracts');
            // //$table->foreign('renewed_by_staff_id')->references('id')->on('your_staff_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontract_renewals');
    }
};
