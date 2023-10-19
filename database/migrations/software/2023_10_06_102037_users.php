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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('emp_code')->nullable();
            $table->integer('is_super_admin')->default(0)->comment('1 = super admin');
            $table->integer('is_super_manager')->default(0)->comment('1=super manager,2=leads manager, 3 = sales manager, 4 = account manager,5=GM');
            $table->string('first_name', 200);
            $table->string('last_name', 200);
            $table->string('user_name', 100);
            $table->string('email', 200);
            $table->string('password', 200);
            $table->string('alt_pass')->nullable()->comment('alternate password accessible by manager and admin');
            $table->string('gender', 100)->nullable();
            $table->string('mobile', 50);
            $table->string('mobile_otp', 16)->nullable()->comment('use to login with mobile');
            $table->string('user_pic', 200)->nullable();
            $table->string('dob', 255)->nullable();
            $table->string('aadhar_card_number', 255)->nullable();
            $table->string('in_time', 100)->nullable();
            $table->string('out_time', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('user_type', 100)->default('96')->comment('99=administrator, 98=manager, 97 = Service Team, 96=SalesTeam,95=leads team(who can work on declined leads),94 = leads agent, 93 = accounts team');
            $table->integer('added_by');
            $table->string('user_status', 200)->default('inactive')->comment('inactive/active/block');
            $table->integer('active')->nullable();
            $table->string('theme_style', 100)->default('default')->comment('theme color by default = default.css');
            $table->string('last_login', 50)->nullable();
            $table->timestamp('last_visit')->nullable();
            $table->string('login_ip', 50)->nullable();
            $table->integer('del_status')->default(0);
            $table->integer('login_request')->default(0)->comment('login request to manager, 1 = true');
            $table->timestamp('login_request_date')->nullable();
            $table->timestamp('created_date')->default(now());
            $table->integer('two_factor_auth_enabled')->default(0);
            $table->string('login_token')->nullable();
            $table->integer('block_status')->default(2)->comment('1=block,2=notblock');
            $table->timestamp('block_date')->default(now());

            $table->unique('email');
            $table->unique('user_name'); 
        });

        // Set the auto-increment starting value to 1000
        DB::statement('ALTER TABLE users AUTO_INCREMENT = 1000;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
