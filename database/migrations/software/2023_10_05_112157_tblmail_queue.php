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
        Schema::create('tblmail_queue', function (Blueprint $table) {
            $table->id();
            $table->string('engine', 40)->nullable();
            $table->string('email', 191);
            $table->text('cc')->nullable();
            $table->text('bcc')->nullable();
            $table->mediumText('message');
            $table->mediumText('alt_message')->nullable();
            $table->enum('status', ['pending', 'sending', 'sent', 'failed'])->nullable();
            $table->datetime('date')->nullable();
            $table->text('headers')->nullable();
            $table->mediumText('attachments')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblmail_queue');
    }
};
