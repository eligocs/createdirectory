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
        Schema::create('tblcontracts', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->text('description')->nullable();
            $table->string('subject', 191)->nullable();
            $table->integer('client');
            $table->date('datestart')->nullable();
            $table->date('dateend')->nullable();
            $table->integer('contract_type')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('addedfrom');
            $table->datetime('dateadded');
            $table->integer('isexpirynotified')->default(0);
            $table->decimal('contract_value', 15, 2)->nullable();
            $table->tinyInteger('trash')->default(0);
            $table->tinyInteger('not_visible_to_client')->default(0);
            $table->string('hash', 32)->nullable();
            $table->tinyInteger('signed')->default(0);
            $table->string('signature', 40)->nullable();
            $table->tinyInteger('marked_as_signed')->default(0);
            $table->string('acceptance_firstname', 50)->nullable();
            $table->string('acceptance_lastname', 50)->nullable();
            $table->string('acceptance_email', 100)->nullable();
            $table->datetime('acceptance_date')->nullable();
            $table->string('acceptance_ip', 40)->nullable();
            $table->string('short_link', 100)->nullable();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // $table->foreign('client')->references('id')->on('your_client_table_name');
            // $table->foreign('contract_type')->references('id')->on('your_contract_type_table_name');
            // $table->foreign('project_id')->references('id')->on('your_project_table_name');
            // $table->foreign('addedfrom')->references('id')->on('your_user_table_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontracts');
    }
};
