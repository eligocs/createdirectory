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
        Schema::create('tblemailtemplates', function (Blueprint $table) {
            $table->id('emailtemplateid');
            $table->mediumText('type');
            $table->string('slug', 100);
            $table->string('language', 40)->nullable();
            $table->mediumText('name');
            $table->mediumText('subject');
            $table->mediumText('message');
            $table->mediumText('fromname');
            $table->string('fromemail', 100)->nullable();
            $table->tinyInteger('plaintext')->default(0);
            $table->tinyInteger('active')->default(0);
            $table->integer('order');

            $table->timestamps();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblemailtemplates');
    }
};
