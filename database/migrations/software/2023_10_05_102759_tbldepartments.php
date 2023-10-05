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
        Schema::create('tbldepartments', function (Blueprint $table) {
            $table->id('departmentid');
            $table->string('name', 100);
            $table->string('imap_username', 191)->nullable();
            $table->string('email', 100)->nullable();
            $table->boolean('email_from_header')->default(0);
            $table->string('host', 150)->nullable();
            $table->mediumText('password')->nullable();
            $table->string('encryption', 3)->nullable();
            $table->string('folder', 191)->default('INBOX');
            $table->integer('delete_after_import')->default(0);
            $table->mediumText('calendar_id')->nullable();
            $table->boolean('hidefromclient')->default(0);
            
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
        Schema::dropIfExists('tbldepartments');
    }
};
