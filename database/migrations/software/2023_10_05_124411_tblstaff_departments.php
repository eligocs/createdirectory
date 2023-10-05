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
        Schema::create('tblstaff_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staffid');
            $table->unsignedBigInteger('departmentid');
            $table->timestamps();

            $table->foreign('staffid')->references('staffid')->on('tblstaff')->onDelete('cascade');
            $table->foreign('departmentid')->references('departmentid')->on('your_department_table_name')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblstaff_departments');
    }
};
