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
        Schema::create('ac_vendor_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('alternate_contact_number', 200)->default('');
            $table->string('address')->nullable();
            $table->string('remarks')->nullable();
            $table->string('updated_by')->nullable();
            $table->tinyInteger('del_status')->default(0);
            $table->timestamps(); // Add the created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ac_vendor_accounts');
    }
};
