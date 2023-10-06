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
        Schema::create('tbltickets', function (Blueprint $table) {
            $table->id('ticketid');
            $table->integer('adminreplying')->default(0);
            $table->integer('userid');
            $table->integer('contactid')->default(0);
            $table->integer('merged_ticket_id')->nullable();
            $table->text('email');
            $table->text('name');
            $table->integer('department');
            $table->integer('priority');
            $table->integer('status');
            $table->integer('service')->nullable();
            $table->string('ticketkey', 32);
            $table->string('subject', 191);
            $table->text('message')->nullable();
            $table->integer('admin')->nullable();
            $table->dateTime('date');
            $table->integer('project_id')->default(0);
            $table->dateTime('lastreply')->nullable();
            $table->integer('clientread')->default(0);
            $table->integer('adminread')->default(0);
            $table->integer('assigned')->default(0);
            $table->integer('staff_id_replying')->nullable();
            $table->string('cc', 191)->nullable();

            $table->timestamps();

            // Add any foreign key constraints if needed
            // $table->foreign('admin')->references('id')->on('admin_table');
            // $table->foreign('userid')->references('id')->on('user_table');
            // $table->foreign('contactid')->references('id')->on('contact_table');
            // $table->foreign('department')->references('id')->on('department_table');
            // $table->foreign('priority')->references('id')->on('priority_table');
            // $table->foreign('status')->references('id')->on('status_table');
            // $table->foreign('service')->references('id')->on('service_table');
            // $table->foreign('project_id')->references('id')->on('project_table');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltickets');
    }
};
