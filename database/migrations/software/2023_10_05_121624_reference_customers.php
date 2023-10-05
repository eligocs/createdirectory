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
        Schema::create('reference_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('contact', 50);
            $table->string('email', 50);
            $table->integer('state');
            $table->integer('city');
            $table->integer('del_status')->default(0);
            $table->timestamp('updated')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
            $table->timestamp('created')->default(\DB::raw('current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reference_customers');
    }
};
