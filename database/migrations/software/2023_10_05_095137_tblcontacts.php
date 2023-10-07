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
        Schema::create('tblcontacts', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('is_primary')->default(1);
            $table->string('firstname', 191);
            $table->string('lastname', 191);
            $table->string('email', 100);
            $table->string('phonenumber', 100);
            $table->string('title', 100)->nullable();
            $table->datetime('datecreated');
            $table->string('password', 255)->nullable();
            $table->string('new_pass_key', 32)->nullable();
            $table->datetime('new_pass_key_requested')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('email_verification_key', 32)->nullable();
            $table->datetime('email_verification_sent_at')->nullable();
            $table->string('last_ip', 40)->nullable();
            $table->datetime('last_login')->nullable();
            $table->datetime('last_password_change')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('profile_image', 191)->nullable();
            $table->string('direction', 3)->nullable();
            $table->tinyInteger('invoice_emails')->default(1);
            $table->tinyInteger('estimate_emails')->default(1);
            $table->tinyInteger('credit_note_emails')->default(1);
            $table->tinyInteger('contract_emails')->default(1);
            $table->tinyInteger('task_emails')->default(1);
            $table->tinyInteger('project_emails')->default(1);
            $table->tinyInteger('ticket_emails')->default(1);

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('userid')->references('id')->on('your_user_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontacts');
    }
};
