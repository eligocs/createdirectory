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
        Schema::create('marketing', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id')->default(1)->comment('1=travel partner');
            $table->string('name', 100);
            $table->string('email_id', 100);
            $table->string('contact_number', 200);
            $table->string('whats_app_number', 200);
            $table->string('company_name', 200);
            $table->string('state', 200);
            $table->string('city', 200);
            $table->string('place', 200);
            $table->string('website', 255);
            $table->integer('del_status')->default(0);
            $table->integer('agent_id');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing');
    }
};
