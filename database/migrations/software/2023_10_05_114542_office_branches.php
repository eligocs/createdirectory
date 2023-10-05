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
        Schema::create('office_branches', function (Blueprint $table) {
            $table->increments('branch_id');
            $table->string('branch_name', 200);
            $table->string('branch_address', 200);
            $table->string('branch_contact', 100);
            $table->string('email_address', 200);
            $table->integer('head_office')->default(0)->comment('1 for headoffice');
            $table->integer('del_status')->default(0);
            $table->timestamp('created')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_branches');
    }
};
