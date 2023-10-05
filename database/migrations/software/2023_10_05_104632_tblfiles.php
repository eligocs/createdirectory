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
        Schema::create('tblfiles', function (Blueprint $table) {
            $table->id();
            $table->integer('rel_id');
            $table->string('rel_type', 20);
            $table->string('file_name', 191);
            $table->string('filetype', 40)->nullable();
            $table->integer('visible_to_customer')->default(0);
            $table->string('attachment_key', 32)->nullable();
            $table->string('external', 40)->nullable();
            $table->text('external_link')->nullable();
            $table->text('thumbnail_link')->nullable();
            $table->integer('staffid');
            $table->integer('contact_id')->default(0);
            $table->integer('task_comment_id')->default(0);
            $table->datetime('dateadded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblfiles');
    }
};
