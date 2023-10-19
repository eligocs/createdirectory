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
        Schema::create('tblform_questions', function (Blueprint $table) {
            $table->id('questionid');
            $table->integer('rel_id');
            $table->string('rel_type', 20)->nullable();
            $table->mediumText('question');
            $table->tinyInteger('required')->default(0);
            $table->integer('question_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblform_questions');
    }
};
