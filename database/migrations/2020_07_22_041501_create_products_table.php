<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('origin_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->string('sex');
            $table->string('concentration');
            $table->string('volume');
            $table->string('recommended_age');
            $table->string('released_year');
            $table->string('inventor_name');
            $table->string('incense_level');
            $table->string('aroma_level');
            $table->double('price');
            $table->string('style');
            $table->string('recommended_time');
            $table->text('description');
            $table->text('thumbnail');
            $table->integer('status');
            $table->double('rate')->default(0.0);
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
        Schema::dropIfExists('products');
    }
}
