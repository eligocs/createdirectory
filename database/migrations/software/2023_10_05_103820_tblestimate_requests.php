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
        Schema::create('tblestimate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100);
            $table->longText('submission');
            $table->dateTime('last_status_change')->nullable();
            $table->dateTime('date_estimated')->nullable();
            $table->unsignedBigInteger('from_form_id')->nullable();
            $table->unsignedBigInteger('assigned')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->unsignedBigInteger('default_language');
            $table->dateTime('date_added');

            //$table->foreign('from_form_id')->references('id')->on('your_form_table_name'); // Replace 'your_form_table_name' with the actual name of your form's table
            //$table->foreign('assigned')->references('id')->on('users'); // Replace 'users' with your actual users table name
            //$table->foreign('status')->references('id')->on('your_status_table_name'); // Replace 'your_status_table_name' with the actual name of your status table
            //$table->foreign('default_language')->references('id')->on('your_language_table_name'); // Replace 'your_language_table_name' with the actual name of your language table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblestimate_requests');
    }
};
