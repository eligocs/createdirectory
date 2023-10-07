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
        Schema::create('tblsubscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 191);
            $table->text('description')->nullable();
            $table->tinyInteger('description_in_item')->default(0);
            $table->unsignedBigInteger('clientid');
            $table->date('date')->nullable();
            $table->text('terms')->nullable();
            $table->unsignedBigInteger('currency');
            $table->unsignedBigInteger('tax_id')->default(0);
            $table->string('stripe_tax_id', 50)->nullable();
            $table->unsignedBigInteger('tax_id_2')->default(0);
            $table->string('stripe_tax_id_2', 50)->nullable();
            $table->text('stripe_plan_id')->nullable();
            $table->text('stripe_subscription_id');
            $table->bigInteger('next_billing_cycle')->nullable();
            $table->bigInteger('ends_at')->nullable();
            $table->string('status', 50)->nullable();
            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('project_id')->default(0);
            $table->string('hash', 32);
            $table->datetime('created');
            $table->unsignedBigInteger('created_from');
            $table->datetime('date_subscribed')->nullable();
            $table->integer('in_test_environment')->nullable();
            $table->timestamps();

            //$table->foreign('clientid')->references('id')->on('clients');
            //$table->foreign('currency')->references('id')->on('currencies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblsubscriptions');
    }
};
