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
        Schema::create('tblproposal_comments', function (Blueprint $table) {
            $table->id();
            $table->mediumText('content')->nullable();
            $table->integer('proposalid');
            $table->integer('staffid');
            $table->dateTime('dateadded');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblproposal_comments');
    }
};
