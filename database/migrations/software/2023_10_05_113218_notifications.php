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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->string('body', 255);
            $table->string('url', 100);
            $table->timestamp('notification_time')->nullable();
            $table->tinyInteger('read_status')->default(0)->comment('0=unread,1=read');
            $table->integer('customer_id')->comment('999 = lead from india tourizm');
            $table->integer('notification_type')->default(0)->comment('1 = Lead follow 2 = Iti follow 3=price pending 4 =payment schedule 0 = other');
            $table->integer('notification_for')->default(0)->comment('99 = admin,988 = super manager, 98 = manager, 96 = sales team, 97= service team, 95 = leads team');
            $table->integer('agent_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
