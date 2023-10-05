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
        Schema::create('tblcountries', function (Blueprint $table) {
            $table->id('country_id');
            $table->char('iso2', 2)->nullable();
            $table->string('short_name', 80)->default('');
            $table->string('long_name', 80)->default('');
            $table->char('iso3', 3)->nullable();
            $table->string('numcode', 6)->nullable();
            $table->string('un_member', 12)->nullable();
            $table->string('calling_code', 8)->nullable();
            $table->string('cctld', 5)->nullable();

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
        Schema::dropIfExists('tblcountries');
    }
};
