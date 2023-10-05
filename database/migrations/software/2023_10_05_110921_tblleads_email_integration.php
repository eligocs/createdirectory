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
        Schema::create('tblleads_email_integration', function (Blueprint $table) {
            $table->id()->comment('the ID always must be 1');
            $table->integer('active');
            $table->string('email', 100);
            $table->string('imap_server', 100);
            $table->mediumText('password');
            $table->integer('check_every');
            $table->integer('responsible');
            $table->integer('lead_source');
            $table->integer('lead_status');
            $table->string('encryption', 3)->nullable();
            $table->string('folder', 100);
            $table->string('last_run', 50)->nullable();
            $table->tinyInteger('notify_lead_imported')->default(1);
            $table->tinyInteger('notify_lead_contact_more_times')->default(1);
            $table->string('notify_type', 20)->nullable();
            $table->mediumText('notify_ids')->nullable();
            $table->integer('mark_public')->default(0);
            $table->tinyInteger('only_loop_on_unseen_emails')->default(1);
            $table->integer('delete_after_import')->default(0);
            $table->integer('create_task_if_customer')->default(0);

            // Define foreign key constraints here if needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblleads_email_integration');
    }
};
