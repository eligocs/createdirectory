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
        Schema::create('tblknowledge_base', function (Blueprint $table) {
            $table->id('articleid');
            $table->unsignedBigInteger('articlegroup');
            $table->mediumText('subject');
            $table->text('description');
            $table->mediumText('slug');
            $table->tinyInteger('active');
            $table->datetime('datecreated');
            $table->integer('article_order')->default(0);
            $table->integer('staff_article')->default(0);

            //$table->foreign('articlegroup')->references('id')->on('your_articlegroups_table_name_here');
            // Add foreign key constraints for other columns as needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblknowledge_base');
    }
};
