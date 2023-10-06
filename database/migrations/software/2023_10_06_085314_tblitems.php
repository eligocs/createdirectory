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
            $table->string('unit', 40)->nullable();
            $table->integer('group_id')->default(0);
            $table->string('commodity_code', 100)->nullable();
            $table->text('commodity_barcode');
            $table->integer('unit_id')->nullable();
            $table->string('sku_code', 200)->nullable();
            $table->string('sku_name', 200)->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->string('sub_group', 200)->nullable();
            $table->integer('active')->default(1);
            $table->integer('parent_id')->nullable();
            $table->longText('attributes')->nullable();
            $table->longText('parent_attributes')->nullable();
            $table->string('can_be_sold', 100)->default('can_be_sold');
            $table->string('can_be_purchased', 100)->default('can_be_purchased');
            $table->string('can_be_manufacturing', 100)->default('can_be_manufacturing');
            $table->string('can_be_inventory', 100)->default('can_be_inventory');
            $table->integer('from_vendor_item')->nullable();
            $table->text('guarantee');
            $table->text('profif_ratio');
            $table->longText('long_descriptions')->nullable();
            $table->integer('without_checking_warehouse')->default(0);
            $table->text('series_id');
            $table->integer('warehouse_id')->nullable();
            $table->string('origin', 100)->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('style_id')->nullable();
            $table->integer('model_id')->nullable();
            $table->integer('size_id')->nullable();
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
