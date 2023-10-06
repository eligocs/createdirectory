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
        Schema::create('tblvault', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('server_address', 191);
            $table->integer('port')->nullable();
            $table->string('username', 191);
            $table->text('password');
            $table->text('description')->nullable();
            $table->integer('creator');
            $table->string('creator_name', 100)->nullable();
            $table->tinyInteger('visibility')->default(1);
            $table->tinyInteger('share_in_projects')->default(0);
            $table->datetime('last_updated')->nullable();
            $table->string('last_updated_from', 100)->nullable();
            $table->datetime('date_created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblvault');
    }
};
