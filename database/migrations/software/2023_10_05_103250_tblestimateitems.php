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
        Schema::create('tblestimateitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estimateid');
            $table->unsignedBigInteger('itemid');
            $table->integer('qty');

            //$table->foreign('estimateid')->references('id')->on('your_estimate_table_name_here')->onDelete('cascade');
            //$table->foreign('itemid')->references('id')->on('your_item_table_name_here')->onDelete('cascade');

            $table->timestamps();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblestimateitems');
    }
};
