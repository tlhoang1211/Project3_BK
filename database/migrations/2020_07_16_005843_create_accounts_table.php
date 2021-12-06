<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->default(1);
            $table->foreignId('city_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('fullName');
            $table->string('sex');
            $table->date('birthDate');
            $table->string('phoneNumber');
            $table->string('email_verified');
            $table->integer('status');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
