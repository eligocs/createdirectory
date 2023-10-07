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
        Schema::create('tblform_question_box_description', function (Blueprint $table) {
            $table->id('questionboxdescriptionid');
            $table->mediumText('description');
            $table->mediumText('boxid');
            $table->unsignedBigInteger('questionid');

            // Define foreign key constraint
            //$table->foreign('questionid')
                // ->references('questionid')
                // ->on('tblform_questions')
                // ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblform_question_box_description');
    }
};
