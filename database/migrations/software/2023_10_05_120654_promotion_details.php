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
        Schema::create('promotion_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area', 200);
            $table->string('state', 200);
            $table->string('city', 200)->nullable();
            $table->integer('pub_status')->default(0)->comment('1=updated, 0=pending');
            $table->string('promotion_name', 200);
            $table->string('tmp_key', 2000);
            $table->timestamp('created_at')->default(\DB::raw('current_timestamp()'));
            $table->timestamp('updated_at')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_details');
    }
};
