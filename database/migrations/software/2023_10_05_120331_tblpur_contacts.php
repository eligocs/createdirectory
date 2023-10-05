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
        Schema::create('tblpur_contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->integer('is_primary')->default(1);
            $table->string('firstname', 191);
            $table->string('lastname', 191);
            $table->string('email', 100);
            $table->string('phonenumber', 100);
            $table->string('title', 100)->nullable();
            $table->dateTime('datecreated');
            $table->string('password')->nullable();
            $table->string('new_pass_key', 32)->nullable();
            $table->dateTime('new_pass_key_requested')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('email_verification_key', 32)->nullable();
            $table->dateTime('email_verification_sent_at')->nullable();
            $table->string('last_ip', 40)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->dateTime('last_password_change')->nullable();
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpur_contacts');
    }
};
