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
        Schema::create('tbltask_checklist_items', function (Blueprint $table) {
            $table->id();
            $table->integer('taskid');
            $table->text('description');
            $table->integer('finished')->default(0);
            $table->datetime('dateadded');
            $table->integer('addedfrom');
            $table->integer('finished_from')->default(0);
            $table->integer('list_order')->default(0);
            $table->integer('assigned')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbltask_checklist_items');
    }
};
