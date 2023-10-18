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
        Schema::create('tblknowedge_base_article_feedback', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing 'id' column.
            $table->integer('articleanswerid');
            $table->integer('articleid');
            $table->integer('answer');
            $table->string('ip', 40);
            $table->datetime('date');
            $table->timestamps(); // This will create 'created_at' and 'updated_at' columns for timestamps.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblknowedge_base_article_feedback');
    }
};
