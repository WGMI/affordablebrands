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
            $table->string('name');
            $table->string('description');
            $table->double('price');
            $table->string('image');
            $table->integer('available');
            $table->string('slug')->unique();
            $table->boolean('featured')->default(false);
            $table->string('model');
            $table->string('colour');
            $table->string('brand');
            $table->float('tax');
            $table->string('information');
            $table->string('additional_information');
            $table->integer('quantity');
            $table->string('sku');
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
