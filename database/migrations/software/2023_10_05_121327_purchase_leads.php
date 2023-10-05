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
        Schema::create('purchase_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_name', 100);
            $table->string('c_email', 100);
            $table->string('c_contact', 50);
            $table->integer('agent_id');
            $table->integer('del_status')->default(0);
            $table->timestamp('created')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_leads');
    }
};
