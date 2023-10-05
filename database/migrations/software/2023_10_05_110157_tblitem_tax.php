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
        Schema::create('tblitem_tax', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itemid')->nullable();
            $table->unsignedBigInteger('rel_id')->nullable();
            $table->string('rel_type', 20)->nullable();
            $table->decimal('taxrate', 15, 2);
            $table->string('taxname', 100);
            $table->unsignedBigInteger('cust_id')->nullable();
            $table->unsignedBigInteger('advanceId')->nullable();
            // Add more columns as needed

            $table->timestamps();

            $table->foreign('itemid')->references('id')->on('tblitems');
            // Add foreign key constraints for other columns as needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblitem_tax');
    }
};
