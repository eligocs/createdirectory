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
        Schema::create('tblproject_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 191);
            $table->mediumText('original_file_name')->nullable();
            $table->string('subject', 191)->nullable();
            $table->text('description')->nullable();
            $table->string('filetype', 50)->nullable();
            $table->dateTime('dateadded');
            $table->dateTime('last_activity')->nullable();
            $table->integer('project_id');
            $table->tinyInteger('visible_to_customer')->default(0);
            $table->integer('staffid');
            $table->integer('contact_id')->default(0);
            $table->string('external', 40)->nullable();
            $table->text('external_link')->nullable();
            $table->text('thumbnail_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblproject_files');
    }
};
