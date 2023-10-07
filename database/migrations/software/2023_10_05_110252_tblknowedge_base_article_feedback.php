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
        Schema::create('tblknowledge_base_article_feedback', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleanswerid');
            $table->unsignedBigInteger('articleid');
            $table->unsignedBigInteger('answer');
            $table->string('ip', 40);
            $table->datetime('date');

            //$table->foreign('articleanswerid')->references('id')->on('your_article_answer_table_name_here');
            //$table->foreign('articleid')->references('id')->on('your_article_table_name_here');
            //$table->foreign('answer')->references('id')->on('your_answer_table_name_here');
            // Add foreign key constraints for other columns as needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblknowledge_base_article_feedback');
    }
};
