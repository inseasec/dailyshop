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
            $table->integer('department_id')->nullable();
            $table->integer('category_id')->nullable();
             $table->string('name')->nullable();
             $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('actual_price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->string('primary_image')->nullable();
            $table->string('multiple_images')->nullable();
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
