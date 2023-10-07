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
        Schema::create('tblconsents', function (Blueprint $table) {
            $table->id();
            $table->string('action', 10);
            $table->datetime('date');
            $table->string('ip', 40);
            $table->integer('contact_id');
            $table->integer('lead_id');
            $table->text('description')->nullable();
            $table->text('opt_in_purpose_description')->nullable();
            $table->integer('purpose_id');
            $table->string('staff_name', 100)->nullable();

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('contact_id')->references('id')->on('your_contact_table_name');
            // //$table->foreign('lead_id')->references('id')->on('your_lead_table_name');
            // //$table->foreign('purpose_id')->references('id')->on('your_purpose_table_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tblconsents');
    }
};
