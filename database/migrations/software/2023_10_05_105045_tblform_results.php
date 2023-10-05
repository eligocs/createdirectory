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
        Schema::create('tblform_results', function (Blueprint $table) {
            $table->id('resultid');
            $table->unsignedBigInteger('boxid');
            $table->unsignedBigInteger('boxdescriptionid')->nullable();
            $table->unsignedBigInteger('rel_id');
            $table->string('rel_type', 20)->nullable();
            $table->unsignedBigInteger('questionid');
            $table->text('answer')->nullable();
            $table->unsignedBigInteger('resultsetid');

            // Define foreign key constraints
            $table->foreign('boxid')
                ->references('boxid')
                ->on('tblform_question_box')
                ->onDelete('cascade');

            $table->foreign('boxdescriptionid')
                ->references('questionboxdescriptionid')
                ->on('tblform_question_box_description')
                ->onDelete('cascade');

            $table->foreign('rel_id')
                ->references('id')
                ->on('your_rel_id_table') // Replace with your related table name
                ->onDelete('cascade');

            $table->foreign('questionid')
                ->references('questionid')
                ->on('tblform_questions')
                ->onDelete('cascade');

            $table->foreign('resultsetid')
                ->references('resultsetid')
                ->on('your_resultsetid_table') // Replace with your related table name
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblform_results');
    }
};
