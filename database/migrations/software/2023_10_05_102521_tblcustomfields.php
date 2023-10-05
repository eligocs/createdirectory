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
        Schema::create('tblcustomfields', function (Blueprint $table) {
            $table->id();
            $table->string('fieldto', 30)->nullable();
            $table->string('name', 150);
            $table->string('slug', 150);
            $table->boolean('required')->default(false);
            $table->string('type', 20);
            $table->mediumText('options')->nullable();
            $table->boolean('display_inline')->default(false);
            $table->integer('field_order')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('show_on_pdf')->default(false);
            $table->boolean('show_on_ticket_form')->default(false);
            $table->boolean('only_admin')->default(false);
            $table->boolean('show_on_table')->default(false);
            $table->integer('show_on_client_portal')->default(0);
            $table->integer('disallow_client_to_edit')->default(0);
            $table->integer('bs_column')->default(12);
            $table->text('default_value')->nullable();

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
        Schema::dropIfExists('tblcustomfields');
    }
};
