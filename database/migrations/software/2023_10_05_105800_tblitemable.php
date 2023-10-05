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
        Schema::create('tblitems', function (Blueprint $table) {
            $table->id();
            $table->mediumText('description')->nullable();
            $table->text('long_description')->nullable();
            $table->decimal('rate', 15, 2)->nullable();
            $table->integer('tax')->nullable();
            $table->integer('tax2')->nullable();
            $table->varchar('unit', 40)->nullable();
            $table->integer('group_id')->default(0);
            $table->varchar('commodity_code', 100)->nullable();
            $table->text('commodity_barcode')->nullable();
            $table->integer('unit_id')->nullable();
            $table->varchar('sku_code', 200)->nullable();
            $table->varchar('sku_name', 200)->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->varchar('sub_group', 200)->nullable();
            $table->integer('active')->default(1);
            $table->integer('parent_id')->nullable();
            $table->longText('attributes')->nullable();
            $table->longText('parent_attributes')->nullable();
            $table->varchar('can_be_sold', 100)->default('can_be_sold');
            $table->varchar('can_be_purchased', 100)->default('can_be_purchased');
            $table->varchar('can_be_manufacturing', 100)->default('can_be_manufacturing');
            $table->varchar('can_be_inventory', 100)->default('can_be_inventory');
            $table->integer('from_vendor_item')->nullable();
            $table->text('guarantee')->nullable();
            $table->text('profif_ratio')->nullable();
            $table->longText('long_descriptions')->nullable();
            $table->integer('without_checking_warehouse')->default(0);
            $table->text('series_id')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->varchar('origin', 100)->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('style_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('size_id')->nullable();
            // Add more columns as needed

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblitems');
    }
};
