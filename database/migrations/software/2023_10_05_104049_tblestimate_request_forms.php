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
        Schema::create('tblestimate_request_forms', function (Blueprint $table) {
            $table->id();
            $table->string('form_key', 32);
            $table->string('type', 100);
            $table->string('name', 191);
            $table->mediumText('form_data')->nullable();
            $table->unsignedBigInteger('recaptcha')->nullable();
            $table->unsignedBigInteger('status');
            $table->string('submit_btn_name', 100)->nullable();
            $table->string('submit_btn_bg_color', 10)->default('#84c529');
            $table->string('submit_btn_text_color', 10)->default('#ffffff');
            $table->text('success_submit_msg')->nullable();
            $table->unsignedBigInteger('submit_action')->default(0);
            $table->mediumText('submit_redirect_url')->nullable();
            $table->string('language', 100)->nullable();
            $table->dateTime('dateadded')->nullable();
            $table->string('notify_type', 100)->nullable();
            $table->mediumText('notify_ids')->nullable();
            $table->unsignedBigInteger('responsible')->nullable();
            $table->unsignedBigInteger('notify_request_submitted')->default(0);

            $table->foreign('recaptcha')->references('id')->on('your_recaptcha_table_name'); // Replace 'your_recaptcha_table_name' with the actual name of your reCAPTCHA table
            $table->foreign('status')->references('id')->on('your_status_table_name'); // Replace 'your_status_table_name' with the actual name of your status table
            $table->foreign('submit_action')->references('id')->on('your_submit_action_table_name'); // Replace 'your_submit_action_table_name' with the actual name of your submit action table
            $table->foreign('responsible')->references('id')->on('your_responsible_table_name'); // Replace 'your_responsible_table_name' with the actual name of your responsible table

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblestimate_request_forms');
    }
};
