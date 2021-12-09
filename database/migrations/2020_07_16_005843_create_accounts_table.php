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
            $table->foreignId('city_id')->nullable();
            $table->string('email')->unique();
            $table->string('provided_id')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password')->nullable();
            $table->string('fullName');
            $table->string('sex')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('email_verified')->nullable();
            $table->integer('status')->nullable();
            $table->string('address')->nullable();
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
