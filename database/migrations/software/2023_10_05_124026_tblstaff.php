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
        Schema::create('tblstaff', function (Blueprint $table) {
            $table->id('staffid');
            $table->string('email', 100)->unique();
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->mediumText('facebook')->nullable();
            $table->mediumText('linkedin')->nullable();
            $table->string('phonenumber', 30)->nullable();
            $table->string('skype', 50)->nullable();
            $table->string('password', 250);
            $table->timestamps(0);
            $table->string('profile_image', 191)->nullable();
            $table->string('last_ip', 40)->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->timestamp('last_password_change')->nullable();
            $table->string('new_pass_key', 32)->nullable();
            $table->timestamp('new_pass_key_requested')->nullable();
            $table->tinyInteger('admin')->default(0);
            $table->unsignedBigInteger('role')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->string('default_language', 40)->nullable();
            $table->string('direction', 3)->nullable();
            $table->string('media_path_slug', 191)->nullable();
            $table->tinyInteger('is_not_staff')->default(0);
            $table->decimal('hourly_rate', 15, 2)->default(0.00);
            $table->tinyInteger('two_factor_auth_enabled')->default(0);
            $table->string('two_factor_auth_code', 100)->nullable();
            $table->timestamp('two_factor_auth_code_requested')->nullable();
            $table->text('email_signature')->nullable();
            $table->text('google_auth_secret')->nullable();
            $table->tinyInteger('main_admin')->default(2);
            $table->string('login_token', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblstaff');
    }
};
