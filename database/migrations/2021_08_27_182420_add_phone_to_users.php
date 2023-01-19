<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('id')->unique();
            $table->boolean('status')->after('password')->default(true);
            $table->string('photo_url')->after('email')->default('/assets/images/users/default.png')->nullable();
            $table->text('address')->after('photo_url')->nullable();
            $table->mediumText('signature')->after('address')->nullable();
            $table->string('jobs')->after('address')->default('-')->nullable();
            $table->enum('religion', ['Islam', 'Kristen (Katolik)', 'Kristen (Protestan)', 'Hindu', 'Budha', 'Konghucu'])->default('Islam')->after('jobs');
            $table->dateTime('last_login_at')->after('status')->nullable();
            $table->string('last_login_ip')->after('last_login_at')->nullable()->default('-');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
