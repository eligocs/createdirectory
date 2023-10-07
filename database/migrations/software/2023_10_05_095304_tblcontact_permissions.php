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
        Schema::create('tblcontact_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('permission_id');
            $table->integer('userid');

            // If you want to set the charset and engine:
            // $table->charset = 'utf8';
            // $table->engine = 'InnoDB';

            // Define foreign key constraints if needed.
            // //$table->foreign('permission_id')->references('id')->on('your_permission_table_name');
            // //$table->foreign('userid')->references('id')->on('your_user_table_name');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcontact_permissions');
    }
};
