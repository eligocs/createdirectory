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
        Schema::create('tblstafftasksattachments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('file_name');
            $table->mediumText('original_file_name');
            $table->string('filetype', 50)->nullable();
            $table->dateTime('dateadded');
            $table->unsignedBigInteger('taskid');
            $table->timestamps();

            $table->foreign('taskid')->references('id')->on('your_task_table_name')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblstafftasksattachments');
    }
};
