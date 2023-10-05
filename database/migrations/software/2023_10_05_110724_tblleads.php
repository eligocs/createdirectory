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
        Schema::create('tblleads', function (Blueprint $table) {
            $table->id();
            $table->string('hash', 65)->nullable();
            $table->string('name', 191);
            $table->string('title', 100)->nullable();
            $table->string('company', 191)->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('country')->default(0);
            $table->string('zip', 15)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->unsignedBigInteger('assigned')->default(0);
            $table->datetime('dateadded');
            $table->unsignedBigInteger('from_form_id')->default(0);
            $table->unsignedBigInteger('status');
            $table->unsignedBigInteger('source');
            $table->datetime('lastcontact')->nullable();
            $table->date('dateassigned')->nullable();
            $table->datetime('last_status_change')->nullable();
            $table->unsignedBigInteger('addedfrom');
            $table->string('email', 100)->nullable();
            $table->string('website', 150)->nullable();
            $table->integer('leadorder')->default(1);
            $table->string('phonenumber', 50)->nullable();
            $table->datetime('date_converted')->nullable();
            $table->tinyInteger('lost')->default(0);
            $table->unsignedBigInteger('junk')->default(0);
            $table->unsignedBigInteger('last_lead_status')->default(0);
            $table->tinyInteger('is_imported_from_email_integration')->default(0);
            $table->string('email_integration_uid', 30)->nullable();
            $table->tinyInteger('is_public')->default(0);
            $table->string('default_language', 40)->nullable();
            $table->unsignedBigInteger('client_id')->default(0);
            $table->decimal('lead_value', 15, 2)->nullable();
            
            // Define foreign key constraints here if needed
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblleads');
    }
};
