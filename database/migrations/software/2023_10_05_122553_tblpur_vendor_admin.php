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
        Schema::create('tblpur_vendor_admin', function (Blueprint $table) {
            $table->integer('staff_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->datetime('date_assigned');

            // Add foreign key constraints if needed
            //$table->foreign('staff_id')->references('id')->on('your_staff_table');
            //$table->foreign('vendor_id')->references('userid')->on('tblpur_vendor');

            // Add primary key if needed
            // $table->primary(['staff_id', 'vendor_id']);

            // Add any other columns or constraints here if necessary

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_vendor_admin');
    }
};
