<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('train_city', function (Blueprint $table) {
            $table->id();
            $table->string('station', 50);
            $table->string('code', 50);
            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns
        });
        DB::statement('ALTER TABLE tblroles AUTO_INCREMENT = 804;');
    }

    public function down()
    {
        Schema::dropIfExists('train_city');
    }
};
