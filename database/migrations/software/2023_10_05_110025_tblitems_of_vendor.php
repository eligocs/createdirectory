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
        Schema::create('tblitems_of_vendor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->text('description');
            $table->text('long_description')->nullable();
            $table->decimal('rate', 15, 2)->nullable();
            $table->integer('tax')->nullable();
            $table->integer('tax2')->nullable();
            $table->string('unit', 40)->nullable();
            $table->integer('group_id');
            $table->string('commodity_code', 100);
            $table->text('commodity_barcode')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('sku_code', 200)->nullable();
            $table->string('sku_name', 200)->nullable();
            $table->string('sub_group', 200)->nullable();
            $table->integer('active')->nullable();
            $table->integer('parent')->nullable();
            $table->longText('attributes')->nullable();
            $table->longText('parent_attributes')->nullable();
            $table->integer('commodity_type')->nullable();
            $table->string('origin', 100)->nullable();
            $table->string('commodity_name', 200);
            $table->text('series_id')->nullable();
            $table->longText('long_descriptions')->nullable();
            $table->integer('share_status')->default(0);
            // Add more columns as needed

            $table->timestamps();

            //$table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblitems_of_vendor');
    }
};
