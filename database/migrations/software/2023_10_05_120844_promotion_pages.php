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
        Schema::create('promotion_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promotion_id');
            $table->string('page_type', 100)->default('0')->comment('0 = image , 1 = text');
            $table->string('page_title', 300);
            $table->text('content');
            $table->integer('p_order');
            $table->timestamp('created_at')->default(\DB::raw('current_timestamp()'));
            $table->timestamp('updated_at')->default(\DB::raw('current_timestamp() on update current_timestamp()'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_pages');
    }
};
