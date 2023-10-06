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
        Schema::create('teamleaders', function (Blueprint $table) {
            $table->id();
            $table->string('team_name', 255);
            $table->integer('leader_id');
            $table->text('assigned_members')->comment('users ids who are assigned to Teamleader');
            $table->integer('leader_created_by')->comment('who created team leader');
            $table->timestamp('created')->default(now());

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teamleaders');
    }
};
