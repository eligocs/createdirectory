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
        Schema::create('room_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan', 20)->nullable()->comment('em = extra mattress, emc = extra mattress children');
            $table->integer('hotel')->nullable();
            $table->integer('room')->nullable();
            $table->float('price')->nullable();
            $table->integer('season')->nullable();
            $table->integer('delstatus')->default(0)->comment('0 default,1 deleted');
            $table->timestamp('created_at')->nullable()->default(\DB::raw('current_timestamp()'));
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_rates');
    }
};
